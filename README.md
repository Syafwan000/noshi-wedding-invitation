
<p align="center">
    <img width="120" height="120" src="https://github.com/Syafwan000/noshi-wedding-invitation/blob/main/public/img/logo.png" alt="NoShi Logo">
</p>

# Digital Wedding Invitation with QR Code

A web-based digital wedding invitation with a charming <b>Nobita and Shizuka theme</b>. Implements QR code scanning for efficient guest attendance tracking and management.


## Features

- Responsive
- Guestbook
- Admin Panel (manage guestbook response, invitation ticket and QR Code Scanner)
- Invitation ticket with QR Code
- QR Code Scanner


## Installation

1. Clone the project

    ```bash
      git clone https://github.com/Syafwan000/noshi-wedding-invitation
    ```

2. Go to the project directory

    ```bash
      cd noshi-wedding-invitation
    ```

3. Add .env file

    ```bash
      cp .env.example .env
    ```

4. Install dependencies

    ```bash
      composer install
      npm install
    ```

5. Seeding the data

   ```bash
      php artisan db:seed
    ```

6. Start the server or build

    ```bash
      npm run dev
      npm run build
    
      php artisan serve
    ```

## Access Admin Panel

Run seeding data first to access admin panel

| **Username**    | **Password**    |
| ---         | ---         |
| admin       | password    |

## License

This project is licensed under the MIT License. See the [LICENSE](https://github.com/Syafwan000/noshi-wedding-invitation/blob/main/LICENSE) file for details.
