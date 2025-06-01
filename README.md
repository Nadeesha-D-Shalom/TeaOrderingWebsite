TeaWeb - Product Showcase Website with Admin Dashboard
TeaWeb is a professional tea product showcase website built for a real-world client.
This project includes:

✅ Frontend — clean, responsive product pages
✅ Admin Login System — secure login with PHP + MySQL
✅ Admin Dashboard — to manage products and admin tasks

📂 Project Structure
bash
Copy
Edit
TeaWeb/
├── index.html           # Main website (frontend)
├── coconut.html         # Coconut product page
├── assets/              # Images, CSS
│   ├── headLogos/
│   ├── bgImage/
│   └── style.css
├── admin/               # Admin panel
│   ├── admin_login.php  # Admin login page
│   ├── admin_dashboard.php  # Admin dashboard
│   ├── add_product.php
│   ├── edit_product.php
│   ├── delete_product.php
│   ├── view_products.php
├── uploads/             # Uploaded product images
├── db.php               # Database connection
🚀 Features
Secure Admin Login (PHP + MySQL)

Protected Admin Dashboard with session check

Sidebar with:

Tea Product Manager

Coconut Product Manager

Spices Product Manager

Rice Product Manager

Admin Manager

Real-time Date & Time

Logout button

Product Management:

Add / Edit / Delete products

Image upload

Optional price display

Clean custom CSS, no external frameworks used

Responsive design (desktop & mobile)

Ready for deployment to GoDaddy Shared Hosting

🛠 Technologies Used
HTML5

CSS3

JavaScript

PHP 8.x

MySQL

XAMPP (local development)

⚙️ How to Run Locally
1️⃣ Clone the repo:

bash
Copy
Edit
git clone https://github.com/yourusername/TeaWeb.git
2️⃣ Import database:

Open phpMyAdmin

Create database: tea_ordering_db

Import tea_ordering_db.sql (exported from your XAMPP/phpMyAdmin)

3️⃣ Configure database:

Edit db.php:

php
Copy
Edit
$host = "localhost";
$user = "root";
$password = "";
$dbname = "tea_ordering_db";
4️⃣ Run in browser:

bash
Copy
Edit
http://localhost/TeaWeb/index.html               # Frontend
http://localhost/TeaWeb/admin/admin_login.php     # Admin login
👥 Admin Login Credentials (Demo)
text
Copy
Edit
Username: admin
Password: 1234
🌐 Deployment
The project is designed to deploy to GoDaddy Shared Hosting:

Upload TeaWeb/ contents to /public_html/ via FileZilla.

Import database to GoDaddy's MySQL (cPanel).

💻 Author
Nadeesha D Shalom
LinkedIn: [Your LinkedIn URL]
GitHub: [Your GitHub URL]

📜 License
This project is developed for educational and client purposes.
Do not copy for commercial use without permission.

