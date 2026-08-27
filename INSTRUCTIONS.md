# ITST 302 – Client-Server Technologies: Week 4 Laboratory Activity

## Mini Project 03: Student Registration System with Laravel Forms, Validation, and File Upload

### Course Information

| Item | Details |
| :--- | :--- |
| **Course** | ITST 302-Client-Server Technologies |
| **Week** | Week 4 |
| **Module** | Module 1-Client Requests and Form Processing |
| **Topic** | Laravel Forms, Request Handling, Validation, Flash Messages, and File Upload |
| **Project** | Mini Project MP03 - Student Registration System |
| **Type** | Individual |
| **Points** | 100 Points |
| **Submission** | GitHub Repository + Documentation + LinkedIn Portfolio + LMS |

---

### Activity Overview
One of the most common features in enterprise information systems is user registration. Universities, companies, hospitals, banks, and government agencies all require secure and validated registration systems to collect and manage user information.

In this laboratory activity, students will build a Student Registration System using Laravel. They will create a registration form, validate user input, upload a student profile picture, display success or error notifications using flash messages, and store student information in a MySQL database.

This activity introduces students to Laravel's Request Lifecycle, server-side validation, database interaction, and secure handling of uploaded files. The skills learned here will be reused throughout the semester in the Enterprise Laravel E-Commerce Project.

---

### Intended Learning Outcomes (ILO)
At the end of this activity, students should be able to:
1. Develop HTML forms using Blade templates.
2. Process client requests using Laravel controllers.
3. Implement server-side validation using Laravel Validation Rules.
4. Display flash messages for successful and failed operations.
5. Upload and securely store files using Laravel Storage.
6. Design and implement a relational database table.
7. Document software development processes using Markdown.
8. Apply Git version control and portfolio-building practices.

---

### Learning Objectives
Upon successful completion of this activity, students will:
- Create professional registration forms.
- Validate user input.
- Prevent invalid submissions.
- Upload profile pictures.
- Store records in MySQL.
- Understand Laravel's request lifecycle.
- Continue building a professional GitHub portfolio.

---

### Mini Project Details

**Project Title:** Student Registration System

**Scenario:**
The College of Information Technology is transitioning from paper-based student registration to a digital registration system. As a Junior Laravel Developer, your task is to develop the registration module that allows students to register online while ensuring that submitted information is valid, secure, and stored correctly.

#### Functional Requirements
The system must allow users to:
- Register a student.
- Upload a profile picture.
- Validate required fields.
- Display success and error notifications.
- Store student information in the database.
- View the registered student details after successful registration.

#### Required Student Information
The registration form must contain the following fields:

| Field | Validation |
| :--- | :--- |
| Student ID | Required, unique |
| First Name | Required |
| Middle Name | Optional |
| Last Name | Required |
| Email Address | Required, valid email, unique |
| Mobile Number | Required, numeric |
| Date of Birth | Required |
| Gender | Required |
| Program | Required |
| Year Level | Required |
| Address | Required |
| Profile Picture | Required, image only |

---

### Technical Requirements
Students must implement the following Laravel features:

#### 1. Blade Forms
Use Blade templates to build the registration form.

#### 2. Request Validation
Implement validation inside the controller or a Form Request class.

*Example validation rules:*
```php
$request->validate([
    'student_id' => 'required|unique:students',
    'first_name' => 'required|string|max:100',
    'last_name' => 'required|string|max:100',
    'email' => 'required|email|unique:students',
    'mobile_number' => 'required|numeric',
    'program' => 'required',
    'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048'
]);
```

#### 3. Flash Messages
- Display a success notification after registration (e.g., "Student registered successfully!").
- Display validation errors when submission fails.

#### 4. File Upload
Upload the student's profile picture using Laravel Storage.
- Store images inside the `storage/app/public` directory.
- Create a symbolic link using: `php artisan storage:link`
- Save only the file path in the database.
- Display the uploaded image after successful registration.

#### 5. Database
Create a `students` table using Laravel Migrations.
*Suggested columns:* `id`, `student_id`, `first_name`, `middle_name`, `last_name`, `email`, `mobile_number`, `gender`, `date_of_birth`, `program`, `year_level`, `address`, `profile_picture`, `created_at`, `updated_at`

#### 6. Routes
Create routes for:
- Registration Form
- Save Registration
- View Student Information

#### 7. Controller
Create a `StudentController` with the following methods:
- `index()`
- `create()`
- `store()`
- `show()`

#### 8. User Interface
The interface should include:
- Responsive registration form
- Organized field grouping
- Validation error messages
- Success notification banner
- Student profile preview after registration
*(Use Tailwind CSS (recommended) or Bootstrap).*

---

### GitHub Repository
**Repository Name:** `week04-student-registration`
- Repository must be **Public**.

**Git Requirements:**
- Minimum of 10 meaningful commits.
- *Example commit messages:*
  - `feat: create student migration`
  - `feat: build registration form`
  - `feat: implement validation rules`
  - `feat: add flash messages`
  - `feat: upload student profile picture`
  - `feat: display registered student profile`
  - `docs: update README`
  - `fix: resolve image upload issue`
  - `refactor: clean controller methods`
  - `docs: add screenshots`

#### Repository Structure
```text
week04-student-registration/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentController.php
│   └── Models/
│       └── Student.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
├── routes/
├── storage/
├── screenshots/
└── documentation/
    └── README.md
```

---

### Documentation Requirements (`README.md`)

1. **Project Title**
2. **Introduction**: Explain the purpose of a Student Registration System, the importance of data validation, and the role of registration systems in enterprise applications.
3. **Objectives**: List the learning objectives accomplished during the activity.
4. **Laravel Request Lifecycle**: Explain how a registration request moves through: Browser > Route > Controller > Validation > Model > Database > Response. Include a simple diagram.
5. **Validation Rules**: Discuss required fields, unique constraints, email validation, numeric validation, image validation, and file size restrictions. Explain why each rule is important.
6. **Database Design**: Include Entity Relationship Diagram (ERD), table structure, data types, primary key, and constraints.
7. **Flowchart**: Create a flowchart illustrating the registration process.
   ```mermaid
   graph TD
       A[User Opens Registration Page] --> B[Fill Out Form]
       B --> C[Submit Registration]
       C --> D{Laravel Validation <br> Valid Data?}
       D -- Yes --> E[Save to Database]
       D -- No --> F[Display Errors]
       F --> G[Success Message / Form Reload]
       E --> H[Upload Profile]
       H --> I[Success Message]
       I --> J[Student Profile Page]
   ```
   *(Students may use: Draw.io, Lucidchart, Figma, Canva, Microsoft Visio)*
8. **Screenshots**: Include screenshots of Registration Form, Validation Errors, Successful Registration, Flash Message, Uploaded Profile Picture, Database Table, Student Profile Page, VS Code Project Structure, and GitHub Repository.
9. **Problems Encountered**: Discuss at least three challenges (e.g., validation errors not appearing, image upload path incorrect, database migration failed, storage link missing).
10. **Solutions**: Explain how each problem was solved.
11. **Reflection**: Write a 500-word reflection discussing the importance of validation, lessons learned about handling user input, benefits of server-side validation over client-side validation, importance of file security in web applications, and how registration systems are used in real-world enterprise software.
12. **References**: Use APA 7th Edition formatting. *(Suggested references: Laravel Documentation, PHP Documentation, MySQL Documentation, Tailwind CSS Documentation, MDN Web Docs)*

---

### Additional Requirements

**Required Diagrams (Save in `documentation/` folder):**
- Registration Flowchart
- Database ER Diagram
- Laravel Request Lifecycle Diagram

**Screenshots Folder:**
- Registration Form
- Validation Errors
- Flash Success Message
- Uploaded Image
- Student Profile
- Database Records
- Laravel Project Structure
- GitHub Repository
- Terminal Output
- Browser Output

---

### LinkedIn Portfolio Activity
Students will publish a professional LinkedIn post documenting their Week 4 project.

**Required Content:**
- Brief description of the project.
- Skills learned (Validation, Flash Messages, File Upload, Database Integration).
- Demo GIF or short screen recording showing the registration process.
- Screenshot of the completed registration page.
- GitHub repository link.
- Personal reflection (2-3 sentences).

**Sample Post:**
> **Week 4 - Client-Server Technologies**
> This week, I developed a Student Registration System using Laravel. I implemented server-side validation, flash messages, secure profile image uploads, and database integration while learning how Laravel processes client requests and protects application data.
> This project strengthened my understanding of secure form processing and user input validation—essential features in enterprise web applications.
> 
> Demo GIF: *(Attach GIF or short video)*
> GitHub Repository: *(Insert Link)*
> 
> #Laravel #PHP #Validation #FileUpload #MySQL #GitHub #ClientServer #SoftwareEngineering #ComputerScience

---

### Submission Checklist
Before submitting, ensure that you have:
- [ ] Registration form completed
- [ ] Validation rules implemented
- [ ] Flash messages working
- [ ] File upload functional
- [ ] Student data stored in MySQL
- [ ] Student profile page displays uploaded information
- [ ] Public GitHub repository
- [ ] Minimum of 10 meaningful Git commits
- [ ] Complete `README.md` documentation
- [ ] Flowchart, ERD, and Request Lifecycle diagram included
- [ ] Screenshots folder completed
- [ ] LinkedIn post with Demo GIF published
- [ ] Repository link submitted through the LMS

---

### Grading Rubric (100 Points)

| Criteria | Excellent | Good | Fair | Needs Improvement | Points |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **System Functionality** | Registration, validation, flash messages, file upload, and database integration all work correctly | Minor functionality issues | Several features partially working | Major features missing or non-functional | 30 |
| **Laravel Implementation** | Proper use of Routes, Controller, Model, Validation, Storage, Migrations, and Blade templates | Minor implementation issues | Partial Laravel implementation | Incorrect or incomplete Laravel structure | 20 |
| **Database Design & Validation** | Well-designed database, appropriate validation rules, secure file handling | Minor issues in validation or schema | Basic implementation with some missing constraints | Poor validation or database design | 15 |
| **GitHub Repository Management** | Public repository, organized project, at least 10 meaningful commits, clear commit messages | Minor repository or commit issues | Limited commit history or organization | Repository missing, private, or poorly maintained | 10 |
| **Technical Documentation (README.md)** | Complete, detailed, includes validation rules, flowchart, ERD, request lifecycle, screenshots, problems, solutions, and reflection | Mostly complete with minor omissions | Several required sections missing | Minimal or incomplete documentation | 15 |
| **LinkedIn Portfolio Post** | Professional post with Demo GIF, screenshots, GitHub link, and thoughtful reflection | One required element missing | Basic post with limited explanation | Missing or incomplete post | 5 |
| **Professionalism & Submission Compliance** | Submitted on time, follows all instructions, demonstrates professionalism | Minor formatting or submission issues | Several instruction deviations | Late or major requirements missing | 5 |
| **Total** | | | | | **100** |

---

### Portfolio Milestone
By completing this activity, students will add their first data-driven Laravel application to their professional portfolio. This project showcases practical skills in form processing, secure input validation, database integration, file management, and user experience, which are foundational capabilities expected of junior Laravel developers. Students should feature this repository on their GitHub profile, include it in the "Projects" section of LinkedIn, and archive the Demo GIF and documentation for use in future internship and job applications.
