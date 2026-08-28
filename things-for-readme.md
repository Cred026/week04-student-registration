### Documentation Requirements (`README.md`)

- Create a readme doing this completely, except for number 8, 9, 10. Do all of them, who ever keep the numbering even if you have to skip from 7 to 11

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
    _(Students may use: Draw.io, Lucidchart, Figma, Canva, Microsoft Visio)_
8. **Screenshots**: Include screenshots of Registration Form, Validation Errors, Successful Registration, Flash Message, Uploaded Profile Picture, Database Table, Student Profile Page, VS Code Project Structure, and GitHub Repository.
9. **Problems Encountered**: Discuss at least three challenges (e.g., validation errors not appearing, image upload path incorrect, database migration failed, storage link missing).
10. **Solutions**: Explain how each problem was solved.
11. **Reflection**: Write a 500-word reflection discussing the importance of validation, lessons learned about handling user input, benefits of server-side validation over client-side validation, importance of file security in web applications, and how registration systems are used in real-world enterprise software.
12. **References**: Use APA 7th Edition formatting. _(Suggested references: Laravel Documentation, PHP Documentation, MySQL Documentation, Tailwind CSS Documentation, MDN Web Docs)_
