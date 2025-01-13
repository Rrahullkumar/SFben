This project is designed to demonstrate a functional and visually appealing user interface for SFben, DevOps Lifecycle Summit using HTML, CSS, JavaScript, and PHP as the backend language. It incorporates interactive components such as user registration, an admin panel, and an article management system. . The project also integrates Role-Based Access Control Management System (RBACMS) for secure and efficient admin access.
 Below is an overview of its features and functionalities:
Key Functionalities:
1.	UI:
   ![Screenshot 2025-01-12 182959](https://github.com/user-attachments/assets/e3f6d5cd-df30-412c-87f6-bbce98f09b33)

Footer: 
![Screenshot 2025-01-13 131137](https://github.com/user-attachments/assets/b4afca7a-3f31-48ba-b82d-cc5ec2179a17)

2. Event Registration (Register Now Button):
o	The homepage features a "Register Now" button for the DevOps Lifecycle Summit.
o	When clicked, it opens a registration form where users can input their details.
![Screenshot 2025-01-13 131702](https://github.com/user-attachments/assets/fe23e48c-a06c-44ce-98be-a24505cc0eb7)

 
o	The form submission is handled by a PHP script that stores the user data in a MySQL database created using XAMPP.
 ![Screenshot 2025-01-13 131953](https://github.com/user-attachments/assets/8fc95d10-07aa-4323-b0cd-3d9817f20a85)

o	The database ensures the data is securely stored and can be retrieved for future use.


3. Admin Panel in Hamburger Menu:
![Screenshot 2025-01-13 132056](https://github.com/user-attachments/assets/eff2ad32-5490-45b7-98ed-2699d20f0293)


o	The interface includes a hamburger menu with an option for the admin panel.
o	Admin Login: Admins can log in using their username and password. Credentials are verified using PHP, ensuring secure access.

 ![Screenshot 2025-01-13 132124](https://github.com/user-attachments/assets/ae208221-0275-4efb-aefa-dea7fbe3e930)



 
o	Admin Dashboard: Post-login, the admin is redirected to a dashboard with the following features:
 ![Screenshot 2025-01-13 132211](https://github.com/user-attachments/assets/f360d76e-2019-47ad-944d-5ff3a0422598)

	Add New Article:
	Clicking the "New Article" button opens a rich text editor powered by the Quill JavaScript library, imported via a CDN.
	The editor allows the admin to write and format content effortlessly, which is then saved to the database.
![Screenshot 2025-01-13 132331](https://github.com/user-attachments/assets/b7703e2a-bdd6-45b3-bd85-482afdb33cd7)
![Screenshot 2025-01-13 132508](https://github.com/user-attachments/assets/a7eaaae3-54aa-4ce2-b552-76c4e0da5168)


 
	Delete Article:
	Admins can view a list of existing articles and delete any article directly from the dashboard.
	Deletion operations are securely handled through PHP and database queries.
 
4.	Role-Based Access Control Management System (RBACMS):
o	The RBACMS ensures that only authorized admins can access the admin panel and perform critical operations like adding or deleting articles.
 ![Screenshot 2025-01-13 132721](https://github.com/user-attachments/assets/254f26f8-8e8f-433f-9c9f-2c8802c38a64)

o	User roles are defined in the database, enabling precise control over access and permissions.
 ![Screenshot 2025-01-13 132751](https://github.com/user-attachments/assets/5da885f9-6cea-4d14-bc94-522436fa761c)


 Start XAMPP and ensure MySQL and Apache services are running.
Import the provided database.sql file into your MySQL database.
Configure the database credentials in config.php.
Open the application in your browser:
User Registration: http://localhost/devops-summit/index.html
Admin Login: http://localhost/devops-summit/admin-login.php

# SFben
