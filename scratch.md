- [x] Add `wire:model` to inputs
- [x] Add `wire:submit="register"` to register modal
- [x] Convert `register-modal` to livewire
- [x] Add `name` `email` `password` properties
- [x] Add `register` action
- [x] Add validation

  ```php
  <?php
  $this->validate([
      'email' => ['required', 'lowercase', 'email', 'unique:'.User::class],
      'name' => ['required'],
      'password' => ['required'],
  ]);
  ```
- [x] Hash password
- [x] Create user
- [x] Login user
- [x] Redirect to home
  - with navigate
- [x] Update welcome message on index page
  - show user name
- [x] Add logout user item
  - use @auth directive
- [x] Add `logout` action on click logout
- [x] Convert to livewire component `user-menu`
- [x] Add `logout` action

  ```php
  <?php

  Auth::guard('web')->logout();

  Session::invalidate();
  Session::regenerateToken();
  ```
- [x] Redirect to home
- [x] Add `wire:model` to login inputs
- [x] Add `wire:submit="login"` on login modal
- [x] Convert `login-modal` to livewire
- [x] Add `email` `password` properties
- [x] Add `login` action
- [x] Validate input
- [x] Add validation rules

  ```php
  <?php

  #[Validate(['required', 'email'])]
  public $email;

  #[Validate(['required'])]
  public $password;
  ```
- [ ] Try to authenticate user

  ```php
  <?php

  if (! Auth::attempt($this->only(['email', 'password']), true)) {
      throw ValidationException::withMessages([
          'email' => trans('auth.failed'),
      ]);
  }
  ```
- [ ] Extranct to `authenticate` method
- [ ] Regenerate session
- [ ] Redirect intented and fallback to home
- [ ] Show validation errors
