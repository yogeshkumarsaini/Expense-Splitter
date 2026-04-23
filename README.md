# 💸 Expense Splitter App

A simple Expense Splitter application built in PHP that allows users to add shared expenses and automatically calculate balances — similar to Splitwise.

---

## 🚀 Features

* Add shared expenses
* Split expenses equally among members
* Track who paid and who owes
* View user balances
* Simple and clean Bootstrap UI

---

## 🛠️ Tech Stack

* PHP (Core PHP)
* MySQL
* Bootstrap 5
* HTML/CSS

---

## 📁 Project Structure

```
expense_splitter/
│── config/
│   └── db.php
│── add_expense.php
│── balances.php
│── index.php
│── database.sql
```

---

## ⚙️ Installation & Setup

### 1. Clone / Download Project

Download ZIP or clone repository:

```
git clone https://github.com/yogeshkumarsaini/expense-splitter.git
```

---

### 2. Move to Server Directory

* XAMPP → `htdocs`
* WAMP → `www`

---

### 3. Setup Database

1. Open phpMyAdmin
2. Create database:

```
expense_splitter
```

3. Import:

```
database.sql
```

---

### 4. Configure Database

Edit:

```
config/db.php
```

Update credentials:

```php
$conn = new mysqli("localhost", "root", "", "expense_splitter");
```

---

### 5. Run Project

Open browser:

```
http://localhost/expense_splitter/
```

---

## 📊 How It Works

1. Add expense with:

   * Group ID
   * Paid by (User ID)
   * Amount
   * Members involved

2. System splits amount equally

3. Each member’s share is stored

4. Balance page calculates:

   ```
   Balance = Paid - Owes
   ```

---

## 🧠 Example

If ₹900 expense split between 3 users:

* Each owes ₹300
* If User A paid ₹900 →

  * A gets ₹600 back
  * B owes ₹300
  * C owes ₹300
