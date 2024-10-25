## Auth

- `user-menu` component

  ```html
  <!-- TODO: Create alpine with `showDropdown` -->
  <div class="relative">
      <div class="flex flex-row items-center gap-3">
          <!-- TODO: Add publish button -->

          <!-- TODO: Toggle `showDropdown` on click -->
          <button
              class="flex cursor-pointer flex-row items-center gap-3 rounded-full border-[1px] border-neutral-200 p-4 transition hover:shadow-md lg:px-2 lg:py-1"
          >
              <!-- TODO: add `bars` icon with `size-4` -->
              <div class="hidden lg:block">
                  <!-- TODO: add `avatar` component -->
              </div>
          </button>
      </div>
      <!-- TODO: show if `showDropdown` -->
      <!-- TODO: add `x-cloak` -->
      <div
          class="absolute right-0 top-12 w-[40vw] overflow-hidden rounded-xl bg-white text-sm shadow-md lg:w-56"
      >
          <!-- TODO: hide dropdown on click away -->
          <div class="flex flex-col">
              <!-- TODO: add `menu-item` component -->
              <!-- TODO: add login button -->
              <!-- TODO: add register button -->
          </div>
      </div>
  </div>
  ```
- `bars` icon

  ```html
  <svg
      xmlns="http://www.w3.org/2000/svg"
      viewBox="0 0 16 16"
      fill="currentColor"
  >
      <path
          fill-rule="evenodd"
          d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"
          clip-rule="evenodd"
      />
  </svg>
  ```
- `avatar` icon
  ```html
  <img class="rounded-full" height="30" width="30" alt="Avatar" src="/images/placeholder.jpg" />
  ```
- `menu-item` component

  ```html
  <button class="block w-full px-4 py-3 text-left font-semibold transition hover:bg-neutral-100">
      <!-- Label -->
  </button>
  ```
- `register-modal` component

  ```html
  <!-- TODO:Create alpine component with `showRegisterModal` -->
  <!-- TODO:Listen to `show-register-modal` to show register modal -->
  <div>
      <!-- TODO: add `modal` component -->
  </div>
  ```
- `modal` component

  ```html
  <!-- TODO: Pass attributes -->
  <!-- TODO: Init component with showModal -->
  <!-- TODO: Show modal when showModal -->
  <!-- TODO: Add cloak -->
  <!-- TODO: Hide modal on escape -->
  <!-- TODO: Make it modelable -->
  <!-- TODO: Add transition with opacity only -->

  <div
      class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden bg-neutral-800/70 outline-none focus:outline-none"
  >
      <div class="relative mx-auto my-6 h-full w-full md:h-auto md:w-4/6 lg:h-auto lg:w-3/6 xl:w-2/5">
          <!-- TODO: add transition with alpine -->
          <div class="translate h-full duration-300">
              <!-- TODO: close modal on click away -->
              <div
                  class="translate relative flex h-full w-full flex-col rounded-lg border-0 bg-white shadow-lg outline-none focus:outline-none md:h-auto lg:h-auto"
              >
                  <div class="relative flex items-center justify-center rounded-t border-b-[1px] p-6">
                      <!-- TODO: close modal on click -->
                      <button class="absolute left-9 border-0 p-1 transition hover:opacity-70">
                          <!-- TODO: add close icon "size 18px" -->
                          Cerrar
                      </button>
                      <!-- TODO: add title -->
                  </div>
                  <div class="relative flex-auto p-6">
                      <!-- TODO: add slot -->
                  </div>
                  <div class="flex flex-col gap-2 p-6">
                      <!-- TODO: add footer -->
                  </div>
              </div>
          </div>
      </div>
  </div>
  ```
- `close-icon` component

  ```html
  <svg
      xmlns="http://www.w3.org/2000/svg"
      fill="none"
      viewBox="0 0 24 24"
      stroke-width="1.5"
      stroke="currentColor"
  >
      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
  </svg>
  ```
- Register modal slots

  ```html
  <!-- TODO: Add to title slot -->
  <div class="text-lg font-semibold">Registrarse</div>

  <!-- TODO: Main slot -->
  <form id="registerForm" wire:submit="register" class="flex flex-col gap-4">
      <div>
          <div class="text-2xl font-bold">Bienvenido a StaySpot</div>
          <div class="mt-2 font-light text-neutral-500">Crear una cuenta</div>
      </div>

      <div>
          <!-- TODO: add input component -->
          <!-- TODO: add email input field -->
          <!-- TODO: add `has-error` attribute on field error -->

          <!-- TODO: show on field error -->
          <p class="mt-2 text-rose-500">
              <!-- message -->
          </p>
      </div>
      <div>
          <!-- TODO: add name field -->
      </div>
      <div>
          <!-- TODO: add password field -->
      </div>
  </form>

  <!-- TODO: add to footer slot -->
  <div class="flex w-full flex-row items-center gap-4">
      <!-- TODO: add continue button to submit form -->
  </div>
  <div class="mt-3 flex flex-col gap-4">
      <hr />
      <div class="mt-4 text-center font-light text-neutral-500">
          <div>
              ¿Ya tienes una cuenta?
              <!-- TODO: dispatch evento to show login modal -->
              <button class="cursor-pointer text-neutral-800 hover:underline">Iniciar sesión</button>
          </div>
      </div>
  </div>
  ```
- `input` component

  ```html
  <!-- TODO: Add props for `label`, `disabled` and `hasError` -->

  <div class="relative w-full">
      <!-- TODO: Echo attributes -->
      <!-- TODO: Echo disabled prop -->
      <!-- TODO: Add 'border-rose-500 focus:border-rose-500' classes with error -->
      <!-- TODO: Add 'border-neutral-300 focus:border-black' classes without error -->
      <input
          placeholder=" "
          class="peer w-full rounded-md border-2 bg-white p-4 pl-4 pt-6 font-light outline-none transition disabled:cursor-not-allowed disabled:opacity-70"
      />
      <label
          class="text-md absolute left-4 top-5 z-10 origin-[0] -translate-y-3 transform text-zinc-400 duration-150 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:-translate-y-4 peer-focus:scale-75"
      >
          <!-- TODO: echo `label` slot -->
          <!-- Label -->
      </label>
  </div>
  ```
- `button` component

  ```html
  <!-- TODO: Add props for `disabled`, `outline` and `small` -->

  <!-- TODO: add `border-black bg-white text-black` classes if outline -->
  <!-- TODO: add `border-rose-500 bg-rose-500 text-white` classes unless outline -->
  <!-- TODO: add `border-[1px] py-1 text-sm font-light` classes if small -->
  <!-- TODO: add `border-2 py-3 text-base font-semibold` classes unless small -->
  <button
      class="relative inline-block w-full rounded-lg transition hover:opacity-80 disabled:cursor-not-allowed disabled:opacity-70"
  >
      <!-- Label -->
  </button>
  ```

## Setup project

- Install prettier

  ```bash
  npm install -D prettier prettier-plugin-blade prettier-plugin-tailwindcss
  ```
- Config prettier

  ```json filename=.prettierrc
  {
    "plugins": ["prettier-plugin-blade", "prettier-plugin-tailwindcss"],
    "overrides": [
      {
        "files": ["*.blade.php"],
        "options": {
          "parser": "blade"
        }
      }
    ],
    "printWidth": 120
  }
  ```

  ```json filename=.blade.format.json
  {
    "useLaravelPint": true,
    "echoStyle": "inline"
  }
  ```
- App layout

  ```html
  <!DOCTYPE html>
  <html lang="es" class="h-full">
      <head>
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <!-- TODO: add title tag -->

          <!-- TODO: load app.css -->
      </head>
      <body class="h-full antialiased">
          <!-- TODO: navbar -->
          <div class="pb-20 pt-28">
              <!-- TODO: slot -->
          </div>
      </body>
  </html>
  ```
- Navbar

  ```html
  <div class="fixed z-10 w-full bg-white shadow-sm">
      <div class="border-b-[1px] py-4">
          <!-- TODO: use container -->
              <div class="flex flex-row items-center justify-between gap-3 md:gap-0">
                  <!-- TODO: Logo -->
                  <!-- TODO: User menu -->
              </div>
      </div>
  </div>
  ```
- Container


  ```html
  <div class="mx-auto max-w-[2520px] px-4 sm:px-2 md:px-10 xl:px-20">
      <!-- TODO: add slot -->
  </div>

  ```
- Logo

  ```html
  <span class="hidden md:flex items-center gap-1">
      <svg class="size-8 text-rose-500" width="40" height="48" viewBox="0 0 40 48" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M20 41.1364C21.869 41.1364 23.6681 40.8372 25.352 40.284C23.6346 39.9948 21.8252 39.4121 20.0008 38.5551C18.1759 39.4123 16.366 39.995 14.6484 40.2842C16.3322 40.8372 18.1312 41.1364 20 41.1364ZM3.71724 29.3559C4.00619 27.6376 4.58906 25.8271 5.44654 24.0015C4.58875 22.1756 4.00565 20.3648 3.71654 18.6462C3.16305 20.3307 2.86364 22.1304 2.86364 24C2.86364 25.8704 3.1633 27.6709 3.71724 29.3559ZM7.32138 27.3464C7.16142 27.8146 7.02483 28.2759 6.91178 28.7281C6.02404 32.279 6.67526 34.716 7.98053 36.0213C9.2858 37.3265 11.7228 37.9778 15.2737 37.09C15.726 36.977 16.1874 36.8403 16.6556 36.6803C14.888 35.5255 13.1507 34.1214 11.5152 32.4859C9.87997 30.8507 8.4761 29.1138 7.32138 27.3464ZM20.0008 35.1911C17.8581 34.0187 15.677 32.4051 13.6365 30.3646C11.5963 28.3244 9.98288 26.1437 8.81051 24.0013C9.98295 21.8585 11.5967 19.6772 13.6374 17.6365C15.6776 15.5963 17.8584 13.9828 20.0008 12.8104C22.1433 13.9828 24.3241 15.5963 26.3644 17.6366C28.4051 19.6773 30.0188 21.8585 31.1912 24.0013C30.0189 26.1436 28.4054 28.3243 26.3653 30.3644C24.3247 32.405 22.1435 34.0187 20.0008 35.1911ZM32.6804 27.3464C31.5257 29.1137 30.1218 30.8506 28.4866 32.4857C26.851 34.1213 25.1137 35.5255 23.3459 36.6804C23.8143 36.8404 24.2757 36.9771 24.7281 37.0902C28.279 37.9779 30.716 37.3267 32.0213 36.0214C33.3265 34.7162 33.9778 32.2792 33.09 28.7282C32.977 28.276 32.8404 27.8146 32.6804 27.3464ZM34.5552 24.0015C35.4124 22.1769 35.9953 20.3673 36.2846 18.6498C36.8374 20.3332 37.1364 22.1317 37.1364 24C37.1364 25.8691 36.8371 27.6683 36.2839 29.3523C35.9948 27.6351 35.4121 25.8258 34.5552 24.0015ZM25.3544 7.71676C23.6364 8.00593 21.8261 8.58891 20.0008 9.44641C18.175 8.58874 16.3643 8.00572 14.6459 7.71665C16.3304 7.16309 18.1302 6.86364 20 6.86364C21.8699 6.86364 23.6698 7.16313 25.3544 7.71676ZM34.0581 9.7743C30.4456 6.20415 25.4802 4 20 4C8.9543 4 0 12.9543 0 24C0 35.0457 8.9543 44 20 44C25.4753 44 30.4367 41.7998 34.0483 38.2353C34.08 38.2048 34.1114 38.1739 34.1426 38.1427C34.1738 38.1116 34.2046 38.0802 34.2351 38.0486C37.7997 34.4369 40 29.4754 40 24C40 18.5212 37.797 13.557 34.2285 9.9448C34.2005 9.91577 34.1721 9.88695 34.1435 9.85833C34.1152 9.83005 34.0867 9.80204 34.0581 9.7743ZM16.6559 11.3211C16.1872 11.1609 15.7255 11.0242 15.2729 10.911C11.7219 10.0233 9.28492 10.6745 7.97965 11.9798C6.67438 13.2851 6.02315 15.722 6.91089 19.273C7.02408 19.7258 7.16088 20.1876 7.3211 20.6564C8.47604 18.8885 9.88031 17.1509 11.5161 15.5152C13.1514 13.8799 14.8884 12.4759 16.6559 11.3211ZM32.6806 20.6565C31.5257 18.8885 30.1215 17.151 28.4857 15.5153C26.8503 13.8799 25.1132 12.4759 23.3456 11.3211C23.8144 11.1609 24.2762 11.0241 24.729 10.9109C28.2799 10.0232 30.7169 10.6744 32.0222 11.9796C33.3274 13.2849 33.9787 15.7219 33.0909 19.2729C32.9777 19.7257 32.8409 20.1876 32.6806 20.6565Z"
              fill="currentColor"
          />
      </svg>

      <span class="text-rose-500 text-2xl leading-none font-semibold tracking-tight">stayspot</span>
  </span>
  ```
