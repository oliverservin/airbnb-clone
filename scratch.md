-   [x] Add `@click="$refs.photo.click()"` to button
-   [x] Add `x-ref="photo"` to input
-   [x] Init Alpine component with `x-data`
-   [x] Hide file input
-   [x] Uncomment photo preview
-   [x] Add `:src="photoPreview"` to img preview
-   [x] Init `{ photoPreview: null }` property
-   [x] Add `@change` to file input
-   [x] Create file reader: `const reader = new FileReader()`
-   [x] Assign photo to `photoPreview`:

    ```js
    reader.onload = (e) => {
        photoPreview = e.target.result;
    };
    ```

-   [x] Read selected file on reader

    ```js
    reader.readAsDataURL($refs.photo.files[0]);
    ```

-   [x] Test file input
-   [x] Show photo preview only if there is `photoPreview`
-   [x] Add `wire:model="photo"` to file input
-   [x] Add `photo` property to livewire component
-   [x] Validate photo:

    ```php
    <?php
    $this->validate([
        'photo' => ['nullable', 'image', 'max:2048'],
    ]);
    ```

-   [x] Test upload a file
-   [x] Add `use WithFileUploads;`
-   [x] Update listing photo there is a photo:

    ```php
    <?php
    if ($this->photo) {
        $listing->updatePhoto($this->photo);
    }
    ```

-   [x] Add `updatePhoto` method to Listing model.
-   [x] Accept `$photo` parameter as `UploadedFile`
-   [x] Use `tap` and get the `photo_path`
    
    ```php
    <?php
    tap($this->photo_path, function ($previous) use ($photo) {
        //
    });
    ```
-   [ ] Fill the `photo_path` and save
    
    ```php
    <?php
    $this->fill([
        'photo_path' => $photo->storePublicly('listing-photos', ['disk' => 'public'])
    ])->save();
    ```
-   [ ] Delete `previous` photo

    ```php
    <?php
    if ($previous) {
        Storage::disk('public')->delete($previous);
    }
    ```
- [ ] Uncomment listing photo in `listing-card`
- [ ] Add `$listing->photo_url` as img source
- [ ] Add `photoUrl` method as Attribute
- [ ] Return Attribute get with public photo url or null if no photo

    ```php
    <?php
    return Attribute::get(function () {
        return $this->photo_path
            ? Storage::disk('public')->url($this->photo_path)
            : null;
    });
    ```
- [ ] Test photo in frontend
