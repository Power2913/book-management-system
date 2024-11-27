
# **Book Management System**

A simple Book Management System built with Laravel 10. This application allows users to browse books, view their details, leave comments, rate books, and search for books by title or author. User authentication ensures that only logged-in users can rate or comment on books.

---

## **Features**

- **Home Page**: Displays a paginated list of books with a "Read More" button.
- **Book Details**: Shows detailed information about a specific book with options to rate and comment.
- **Search Functionality**: Allows users to search for books by title or author.
- **User Authentication**: Users can register, log in, and log out. Only authenticated users can rate or comment.
- **Rating System**: Users can give ratings (1–5 stars) to books.
- **Comment System**: Users can leave comments on books.
- **Pagination**: Lists books in a paginated format.

---

## **Technologies Used**

- **Backend Framework**: Laravel 10
- **Frontend**: Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication system
- **Design Patterns**: Repository pattern for code organization

---

## **Setup Instructions**

### Prerequisites

Ensure you have the following installed on your machine:
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-link>
   cd book-management-system
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Environment Configuration**
   - Create a `.env` file by copying the `.env.example` file:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database details:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=book_mgmt
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   Create the required tables in your database:
   ```bash
   php artisan migrate
   ```

6. **Seed the Database**
   Add sample book data:
   ```bash
   php artisan db:seed
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```

   Access the application at [http://localhost:8000](http://localhost:8000).

---

## **Usage**

### Home Page
- Displays a list of books with their titles and authors.
- Pagination is applied for better navigation.

### Book Details
- View detailed information about a book.
- Logged-in users can:
  - Rate the book (1 to 5 stars).
  - Leave comments.

### Search
- Search for books by title or author using the search bar in the navbar.

### Authentication
- Users can register and log in.
- Only authenticated users can:
  - Rate books.
  - Comment on books.

### Logout
- Users can log out using the Logout option in the navbar.
