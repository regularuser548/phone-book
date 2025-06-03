## Installation

**1. Get the app**:

Clone repo:

```bash
git clone https://github.com/regularuser548/phone-book.git
```

**2. Install Dependencies**:

> This project uses Laravel Sail

```bash
cd phone-book
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
cp .env.example .env
sail up -d
sail composer i && sail npm i && sail artisan key:generate && sail artisan storage:link && sail artisan migrate
sail artisan db:seed --class="Regularuser548\\LaravelPhoneBook\\Database\\Seeders\\DatabaseSeeder"
```

**3. Open App**:
> http://localhost/contacts
