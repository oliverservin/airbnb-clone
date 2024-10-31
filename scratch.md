-   [x] Add `@click="$refs.photo.click()"` to button
-   [x] Add `x-ref="photo"` to input
-   [x] Init Alpine component with `x-data`
-   [x] Hide file input
-   [ ] Uncomment photo preview
-   [ ] Add `:src="photoPreview"` to img preview
-   [ ] Init `{ photoPreview: null }` property
-   [ ] Add `@change` to file input
-   [ ] Create file reader: `const reader = new FileReader()`
-   [ ] Assign photo to `photoPreview`:

    ```js
    reader.onload = (e) => {
        photoPreview = e.target.result;
    };
    ```

-   [ ] Read selected file on reader

    ```js
    reader.readAsDataURL($refs.photo.files[0]);
    ```

-   [ ] Test file input
-   [ ] Show photo preview only if there is `photoPreview`
-   [ ] Add `wire:model="photo"` to file input
-   [ ] Add `photo` property to livewire component
-   [ ] Validate photo:

    ```php
    <?php
    $this->validate([
        'photo' => ['nullable', 'image', 'max:2048'],
    ]);
    ```

-   [ ] Test upload a file
-   [ ] Add `use WithFileUploads;`
-   [ ] Update listing photo there is a photo:

    ```php
    <?php
    if ($this->photo) {
        $listing->updatePhoto($this->photo);
    }
    ```

-   [ ] Add `updatePhoto` method to Listing model.
-   [ ] Accept `$photo` parameter as `UploadedFile`
-   [ ] Use `tap` and get the `photo_path`
    
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
