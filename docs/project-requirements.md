# Student Registration Project Requirements

This is a working checklist for Mini Project 03. Consult the root [`INSTRUCTIONS.md`](../INSTRUCTIONS.md) when wording or grading details matter.

## Required Behavior

Build a Laravel student registration flow that can:

- Display a responsive Blade registration form.
- Validate submissions on the server and show field errors.
- Store a unique student ID and email address.
- Upload a required JPG or PNG profile picture, store it on the public disk, and save only its path in the database.
- Flash a success message and display the registered student's information and picture.

The form collects student ID, first/middle/last name, email, mobile number, birth date, gender, program, year level, address, and profile picture. Middle name is optional; all other fields are required. Enforce the detailed type, uniqueness, image, and 2 MB size rules from the assignment.

## Laravel Implementation

- Create the `students` table through a migration with timestamps and constraints.
- Use a `Student` model and `StudentController` methods `index`, `create`, `store`, and `show`.
- Add routes for the form, submission, listing, and student profile.
- Store public uploads under `storage/app/public` and run `php artisan storage:link`.
- Use Tailwind CSS or Bootstrap for an organized, responsive interface.
- Use SQLite during current development; see [`database-setup.md`](database-setup.md) for the eventual MariaDB switch.

## Documentation and Evidence

The final project README must explain the project, objectives, request lifecycle, validation choices, database design, problems and solutions, references, and a 500-word reflection. Include a request-lifecycle diagram, registration flowchart, ERD, and screenshots of the form, validation, success state, upload, profile, database, project structure, repository, terminal, and browser output.

Use APA 7th Edition references. Keep diagrams with the project documentation and screenshots in `screenshots/` as required by the original assignment.

## Git, Portfolio, and Submission

- Keep the GitHub repository public and make at least 10 meaningful commits, such as `feat: build registration form` or `fix: resolve image upload issue`.
- Publish the required LinkedIn post with a short project description, learned skills, demo, screenshot, repository link, and reflection.
- Submit the repository link through the LMS after checking functionality, documentation, diagrams, screenshots, commits, and portfolio evidence.

The rubric allocates 30 points to functionality, 20 to Laravel implementation, 15 each to database/validation and documentation, 10 to GitHub management, and 5 each to the LinkedIn post and submission professionalism.
