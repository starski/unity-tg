# Zoo

- przykładową aplikację możana uruchomić z głównego folderu komendą

```php ./app/index.php```
- wykonane i sprawdzone na PHP 8.2

# Books

1. Schemat tabel:
```sql
CREATE TABLE authors (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100)
);

CREATE TABLE books (
    id SERIAL PRIMARY KEY,
    title VARCHAR(250),
    pub_year INT,
    isbn VARCHAR(20)
);

CREATE TABLE book_authors (
    book_id INT REFERENCES books(id),
    author_id INT REFERENCES authors(id),
    PRIMARY KEY (book_id, author_id)
);

CREATE TABLE reviews (
    id SERIAL PRIMARY KEY,
    rating INT CHECK(rating >=1 AND rating <=10), 
    content TEXT,
    book_id INT REFERENCES books(id)
);
```

2. Zapytanie zwracające imiona i nazwiska autorów, wraz z liczbą napisanych przez nich książek:
```sql
SELECT a.first_name, a.last_name, COUNT(ba.book_id) AS num_books
FROM authors a
JOIN book_authors ba ON a.id = ba.author_id
GROUP BY a.id;
```

3. Zapytanie tworzące widok (perspektywę) zawierający 5-ciu autorów, których średnia ocen wszystkich książek jest najwyższa:
```sql
CREATE VIEW top5_authors AS
SELECT a.first_name, a.last_name, AVG(r.rating) as avg_rating
FROM authors a
JOIN book_authors ba ON a.id = ba.author_id
JOIN reviews r ON ba.book_id = r.book_id
GROUP BY a.id
ORDER BY avg_rating DESC
LIMIT 5;
```