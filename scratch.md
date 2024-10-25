## Auth

- Adding an user menu
  - Add `navbar` component to `app` layout
  - Create `navbar` component
- Create user menu component
  - Add to navbar
- Registering users
  - Add `register-modal` Volt component to `app` layout
  - Create `register-modal`
  - Add `modal` component to `register-modal`
  - Add form content to `register-modal`
  - Add properties to register modal

    ```php
    <?php
    public $name = '';
    public $email = '';
    public $password = '';
    ```
  - Add register action

    ```php
    <?php
    public function register()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'lowercase', 'email', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        Auth::login($user);

        $this->redirect(route('home'), navigate: true);
    }
    ```
  - Show register dropdown button only for guests
- Logging out users
  - Add logout button
  - Add `logout` action on click logout button
  - Convert `user-menu` to volt component
  - Add `logout` action
- Create login-modal component
  - Copy from register modal
  - Title: Iniciar sesión
  - Heading: Bienvenido
    Subheading: Accede a tu cuenta
  - Footer:
    Text: ¿Es la primera vez que utilizas StaySpot?
    Button: Crear una cuenta
- Add properties to login-modal

  ```php
  <?php
  public $email = '';
  public $password = '';
  ```
- Add login action

  ```php
  <?php
  public function login()
  {
      $this->validate([
          'email' => ['required', 'email'],
          'password' => ['required'],
      ]);

      $this->authenticate();

      Session::regenerate();

      $this->redirectIntended(default: route('home'), navigate: true);
  }

  public function authenticate()
  {
      if (! Auth::attempt($this->only(['email', 'password']), true)) {
          throw ValidationException::withMessages([
              'email' => trans('auth.failed'),
          ]);
      }
  }
  ```
- Add login to user menu items
- Update footer actions on auth modals
- Render auth modals only as guest
- Implement toast notifications
  - Dispatch a toast event from `app` layout
  - Add Notfy plugin to `app` layout
  - Add `toast` component to `app` layout
    - Use @persist directive
  - Create `toast` component
  - Dispatch `toast` on login and register
    - login: Sesión iniciada.
    - register: Cuenta creada.

## Setup enviroment

- Install and configure Prettier
- Install folio and volt
- Create first folio page
  - Remove welcome route
  - Add `home` route name
- Create app layout component
  - Create navbar component
  - Create logo component
  - Create container component

## Overall

---

- Init project
- Auth
  - toast
- Publish property
  - images
- Reservations
- Categories
- Locations
- Favorites
- Filters


---

- Laravel new
- install prettier

  ```bash
  npm install -D prettier prettier-plugin-blade prettier-plugin-tailwindcss
  ```
