# Project Title

Simple PHP Form Submission Script with Frontend Validation

## Description

This project is a simple PHP form submission script with frontend validation. It allows users to submit form data, which is then stored in a MySQL database table. The submitted data is validated both on the frontend using JavaScript and on the backend. The project also includes a report page where users can view all the submissions and filter them by date range and/or user ID.

## Installation

1. Clone the project to your local machine.
2. Create a MySQL database.
3. Import the database structure and data from the "form_submission.sql" file located in the project folder.
4. Configure the database connection by editing the `config/config.php` file. Provide the appropriate values for the `DB_HOST`, `DB_USER`, `DB_PASS`, and `DB_NAME` constants.
5. Set other configurations such as `TITLE`, `KEYWORDS`, and `URL` in the `config/config.php` file.
6. Run the project by accessing the configured URL in your web browser.


## Usage

Once the project is installed and running, users can access the form submission page through the provided URL. However, before accessing the form submission page, users need to log in with the following login information:

- User: saidul
- Password: 123456

After logging in successfully, users can proceed to submit the form with the required data from Add  Receipt Menu.

From the Report menu show the report.


Once the project is installed and running, users can access the form submission page through the provided URL. The form fields have different validation requirements for each input:

- Amount: Only accepts numbers.
- Buyer: Allows text, spaces, and numbers, with a maximum length of 20 characters.
- Receipt ID: Only accepts text.
- Items: Allows text, and users can add multiple items using the provided JavaScript-based interface.
- Buyer Email: Accepts valid email addresses.
- Note: Allows any text input within 30 words, including Unicode characters.
- City: Accepts text and spaces.
- Phone: Only accepts numbers. The "880" prefix is automatically prepended via JavaScript.
- Entry By: Only accepts numbers.

The form submission is handled asynchronously using jQuery Ajax, ensuring a seamless user experience.

## Features

- Frontend validation using JavaScript.
- Backend validation for submitted data.
- Automatic retrieval of the user's browser IP for the Buyer IP field.
- Generation of a hash key by encrypting the Receipt ID with a salt using SHA-512.
- Local timezone-based submission date (Entry At).
- Prevention of multiple submissions within 24 hours using cookies.

## Contributing

Contributions to this project are welcome. You can contribute by following these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and commit them with descriptive messages.
4. Push your changes to your forked repository.
5. Submit a pull request, explaining your changes and their benefits.

## License

This project is licensed under the [MIT License](LICENSE).

## Contact

For any questions or inquiries, please contact  with Saidul  (mailto:saidulidb27@gmail.com).

