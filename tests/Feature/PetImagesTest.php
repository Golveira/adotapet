<?php

namespace Tests\Feature;

use App\Http\Livewire\PetImages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;
use Tests\TestCase;

class PetImagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_view_pet_images_page()
    {
        $pet = $this->createPet();

        $this->get("/pets/{$pet->id}/images")
            ->assertRedirect('/login');
    }

    public function test_user_can_view_pet_images_page_of_their_own_pet()
    {
        $user = $this->createUser();
        $pet = $this->createPet(['user_id' => $user->id]);

        $this->actingAs($user)
            ->get("/pets/{$pet->id}/images")
            ->assertOk()
            ->assertSee($pet->name)
            ->assertSee(__('No images found'));
    }

    public function test_user_cannot_view_pet_images_page_of_a_pet_they_do_not_own()
    {
        $user = $this->createUser();
        $pet = $this->createPet();

        $this->actingAs($user)
            ->get("/pets/{$pet->id}/images")
            ->assertForbidden();
    }

    public function test_user_can_upload_images_for_a_pet()
    {
        Storage::fake('public');

        $user = $this->createUser();
        $pet = $this->createPet(['user_id' => $user->id]);
        $images = $this->createImages(2);

        Livewire::actingAs($user)
            ->test(PetImages::class, ['pet' => $pet])
            ->assertSet('pet', $pet)
            ->set('photos', $images)
            ->assertHasNoErrors('photos')
            ->assertEmitted('refresh');

        $pet->refresh();

        $this->assertCount(2, $pet->getMedia('pets-gallery'));
        $this->assertUploadedFiles($images);
    }

    public function test_user_can_delete_an_image_of_a_pet()
    {
        Storage::fake('public');

        $user = $this->createUser();
        $pet = $this->createPet(['user_id' => $user->id]);
        $uploadedImage = $this->uploadImage($pet, 'pet.jpg');

        $this->assertCount(1, $pet->getMedia('pets-gallery'));

        Livewire::actingAs($user)
            ->test(PetImages::class, ['pet' => $pet])
            ->call('delete', $uploadedImage->id)
            ->assertEmitted('refresh');

        $pet->refresh();

        $this->assertCount(0, $pet->getMedia('pets-gallery'));

        Storage::disk('public')->assertMissing("1/{$uploadedImage->file_name}");
    }

    private function createImages($count = 1)
    {
        $images = [];

        for ($i = 0; $i < $count; $i++) {
            $images[] = UploadedFile::fake()->image("pet{$i}.jpg");
        }

        return $images;
    }

    private function uploadImage($pet, $name)
    {
        $image = UploadedFile::fake()->image($name);

        return $pet->addMedia($image)->toMediaCollection('pets-gallery');
    }

    private function assertUploadedFiles($images)
    {
        foreach ($images as $key => $image) {
            $folder = $key + 1; // media library folder name

            Storage::disk('public')->assertExists("$folder/{$image->name}");
        }
    }
}
