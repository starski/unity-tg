# TODO

### Zadanie 1.
Zaprojektuj system klas wirtualnego ZOO, który spełnia następujące wymagania:
* Każde zwierze w ZOO ma swoje imię. Kiedy użyjemy obiektu zwierzęcia jako ciąg znaków,
powinien on zwrócić gatunek oraz jego imię, np:
$dog = new Dog(/* ... */);
//...
echo $dog;
Powinno przykładowo wypisać:
Pies Duke
* Zwierzęta powinny móc być umieszczone w ZOO (dla uproszczenia zakładamy, że
zwierzęta nie zjedzą się nawzajem i nie muszą przebywać w różnych boksach).
* Zwierzęta dzielą się na mięsożerne, roślinożerne, wszystkożerne. Dlatego powinny one
przyjmować różne typy posiłków. Zwierzęta mięsożerne powinny przyjmować posiłki
mięsne, zwierzęta roślinożerne posiłki roślinne, a zwierzęta wszystkożerne powinny
przyjmować oba typy posiłków.
* Niektóre zwierzęta posiadają futro, które należy czesać by dobrze się prezentowały. Klasy
zwierząt posiadających futro powinny zawierać metodę pozwalającą na ich czesanie.
* System klas powinien obejmować następujące gatunki: tygrys, słoń, nosorożec, lis, irbis
śnieżny, królik.

Ocenie podlega sposób podejścia do wykonania zadania, przejrzystość oraz czytelność kodu,
możliwość ewentualnej rozbudowy.

### Zadanie 2.
Zaprojektuj schemat bazy danych dla PostgreSQL 14, który będzie przechowywał autorów
książek, książki i recenzje, spełniający następujące wymagania:
* Tabela autorów powinna zawierać pola imię i nazwisko,
* Tabela książek powinna zawierać tytuł, rok publikacji oraz numer ISBN,
* Tabela recenzji powinna zawierać ocenę w skali 1-10 oraz treść.

1. Zapisz zapytanie SQL tworzące schemat.
2. Zapisz zapytanie zwracające imiona i nazwiska autorów, wraz z liczbą napisanych przez
nich książek.
3. Zapisz zapytanie tworzące perspektywę (widok) zawierający 5-ciu autorów, których średnia
ocen wszystkich książek jest najwyższa.


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
