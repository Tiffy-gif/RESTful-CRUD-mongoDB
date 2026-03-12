# 🚀 Laravel + Node.js + MongoDB User Management System

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Node.js](https://img.shields.io/badge/Node.js-20.x-339933?style=for-the-badge&logo=node.js&logoColor=white)
![MongoDB](https://img.shields.io/badge/MongoDB-7.x-47A248?style=for-the-badge&logo=mongodb&logoColor=white)
![Express](https://img.shields.io/badge/Express-5.x-000000?style=for-the-badge&logo=express&logoColor=white)

## 📋 Project Overview

A full-stack web application that demonstrates a **modern microservices architecture** with:
- **Frontend**: Laravel 12 (Blade templates)
- **Backend API**: Node.js + Express
- **Database**: MongoDB (NoSQL)
- **Communication**: RESTful API with HTTP client

This project implements a complete **CRUD (Create, Read, Update, Delete)** user management system with search functionality.

---

## ✨ Features

### 🎯 Core Functionality
- ✅ **Create Users** - Add new users with name, email, age, city, and phone
- ✅ **Read Users** - View all users or specific user details
- ✅ **Update Users** - Edit existing user information
- ✅ **Delete Users** - Remove users from the system
- ✅ **Search Users** - Find users by name (case-insensitive)

### 🏗️ Architecture
- 🔄 **Separation of Concerns** - Frontend and backend are completely decoupled
- 🌐 **RESTful API** - Clean, standardized API endpoints
- 📦 **Modular Design** - Easy to maintain and extend
- 🔒 **Input Validation** - Both client-side and server-side validation

### 💻 Technical Highlights
- ⚡ **Laravel HTTP Client** - Elegant API communication
- 🍃 **Mongoose ODM** - MongoDB object modeling
- 🎨 **Blade Templating** - Clean, reusable UI components
- 🚦 **Express Routing** - Organized API endpoints
- 📊 **MongoDB Aggregation** - Efficient data querying

---

## 🛠️ Technology Stack

### Frontend (Laravel)
| Technology | Purpose |
|------------|---------|
| Laravel 12 | PHP Framework |
| Blade | Templating Engine |
| Bootstrap 5 | UI Styling |
| Laravel HTTP Client | API Communication |

### Backend (Node.js)
| Technology | Purpose |
|------------|---------|
| Node.js | JavaScript Runtime |
| Express | Web Framework |
| MongoDB | NoSQL Database |
| Mongoose | ODM Library |
| CORS | Cross-Origin Resource Sharing |

---

## 📁 Project Structure

```
📦 user-management-project
├── 📂 frontend-laravel/           # Laravel Application
│   ├── 📂 app/
│   │   ├── 📂 Http/
│   │   │   ├── 📂 Controllers/
│   │   │   │   └── 📄 UserController.php
│   │   │   └── 📂 Middleware/
│   │   └── 📂 Models/
│   │       └── 📄 User.php
│   ├── 📂 resources/
│   │   └── 📂 views/
│   │       ├── 📂 layouts/
│   │       │   └── 📄 app.blade.php
│   │       └── 📂 users/
│   │           ├── 📄 index.blade.php
│   │           ├── 📄 create.blade.php
│   │           ├── 📄 show.blade.php
│   │           └── 📄 edit.blade.php
│   └── 📂 routes/
│       └── 📄 web.php
│
└── 📂 backend-node/                # Node.js API
    ├── 📄 server.js                # Main server file
    ├── 📄 package.json              # Dependencies
    ├── 📄 .env                      # Environment variables
    └── 📂 node_modules/             # Dependencies folder
```

---

## 🔌 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/users` | Get all users |
| GET | `/api/users/id/:id` | Get user by ID |
| GET | `/api/users/name/:name` | Search users by name |
| POST | `/api/users` | Create new user |
| PUT | `/api/users/:id` | Update user |
| DELETE | `/api/users/:id` | Delete user |

### 📦 Sample API Response

```json
{
  "success": true,
  "count": 1,
  "data": [
    {
      "_id": "67d2b8f8a1b2c3d4e5f6g7h8",
      "name": "John Doe",
      "email": "john@example.com",
      "age": 25,
      "city": "Phnom Penh",
      "phone": "012345678",
      "createdAt": "2026-03-12T08:30:00.000Z"
    }
  ]
}
```

---

## 🚀 Installation Guide

### Prerequisites
- PHP ≥ 8.1
- Composer
- Node.js ≥ 18.x
- MongoDB ≥ 6.x
- Git

### 📥 Step-by-Step Setup

#### 1. Clone the Repository
```bash
git clone https://github.com/yourusername/user-management-project.git
cd user-management-project
```

#### 2. Setup Laravel Frontend
```bash
# Navigate to Laravel project
cd mongodb_project

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Update .env with API URL
# Add: API_BASE_URL=http://localhost:3000/api

# Start Laravel server
php artisan serve
```

#### 3. Setup Node.js Backend
```bash
# Navigate to backend folder
cd backend-node

# Install Node dependencies
npm install

# Create .env file
echo "PORT=3000" > .env
echo "MONGODB_URI=mongodb://localhost:27017/userdb" >> .env

# Start Node server
npm start
# or with auto-reload
npm run dev
```

#### 4. Start MongoDB
```bash
# On Windows (if installed as service)
net start MongoDB

# Or run manually
mongod --dbpath=C:\data\db

# On Mac/Linux
sudo systemctl start mongod
```

---

## 🎯 Usage Guide

### Access the Application
- **Laravel Frontend**: http://localhost:8000
- **Node.js API**: http://localhost:3000
- **MongoDB**: mongodb://localhost:27017

### User Operations
1. **View Users** - Navigate to homepage to see all users
2. **Create User** - Click "Create User" and fill the form
3. **View Details** - Click "View" on any user
4. **Edit User** - Click "Edit" to modify user information
5. **Delete User** - Click "Delete" and confirm
6. **Search Users** - Use the search box to find users by name

---

## 🔧 Configuration

### Laravel Environment (`.env`)
```env
APP_NAME="User Management System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

API_BASE_URL=http://localhost:3000/api
```

### Node.js Environment (`backend-node/.env`)
```env
PORT=3000
MONGODB_URI=mongodb://localhost:27017/userdb
```

---

## 📊 Database Schema

### User Collection (MongoDB)
```javascript
{
  _id: ObjectId,
  name: { type: String, required: true },
  email: { type: String, required: true, unique: true },
  age: Number,
  city: String,
  phone: String,
  createdAt: { type: Date, default: Date.now }
}
```

---

## 🧪 Testing the API

### Using Browser
```
http://localhost:3000/api/users
http://localhost:3000/api/users/name/john
```

### Using cURL
```bash
# Get all users
curl http://localhost:3000/api/users

# Create a user
curl -X POST http://localhost:3000/api/users \
  -H "Content-Type: application/json" \
  -d '{"name":"Test User","email":"test@example.com","age":25}'

# Update a user
curl -X PUT http://localhost:3000/api/users/ID_HERE \
  -H "Content-Type: application/json" \
  -d '{"name":"Updated Name"}'

# Delete a user
curl -X DELETE http://localhost:3000/api/users/ID_HERE
```

---

## 🐛 Troubleshooting

| Issue | Solution |
|-------|----------|
| `Connection refused` | Ensure Node.js server is running on port 3000 |
| `MongoDB connection error` | Start MongoDB service |
| `Duplicate key error` | Email already exists - use a different email |
| `cURL error 7` | Check if API URL is correct in Laravel `.env` |
| `Port already in use` | Change PORT in `.env` files |

---

## 👨‍💻 Author

**Vong Panha**
- GitHub: [@VongPanha](https://github.com/Tiffy-gif)
- Email: nhaxtiffy@example.com

---

## 🙏 Acknowledgments

- [Laravel Documentation](https://laravel.com/docs)
- [Node.js Documentation](https://nodejs.org/en/docs/)
- [MongoDB Documentation](https://docs.mongodb.com/)
- [Bootstrap Documentation](https://getbootstrap.com/docs/)

---

## 📸 Screenshots

*(Add screenshots of your application here)*

| Users List | Create User |
|------------|-------------|
| ![Users List](screenshots/users-list.png) | ![Create User](screenshots/create-user.png) |

| Edit User | User Details |
|-----------|--------------|
| ![Edit User](screenshots/edit-user.png) | ![User Details](screenshots/user-details.png) |

---

## 🚦 Status

✅ Project is: **Complete and Functional**

---

## 📞 Support

For support, email your.email@example.com or create an issue in the repository.

---

**Happy Coding!** 🎉
