# Parfemi Nemanja - Pokretanje projekta

Web aplikacija za online pregled i kupovinu parfema sa korisnickim i administratorskim delom.

Ovaj dokument opisuje sve potrebne korake da pokrenes projekat lokalno nakon kloniranja sa udaljenog repozitorijuma.

## 1. Preduslovi

Instaliraj sledece alate:

- PHP 8.2+
- Composer 2+
- Node.js 18+ i npm
- MySQL
- phpMyAdmin
- Git

Provera verzija:

```bash
php -v
composer -V
node -v
npm -v
```

## 2. Kloniranje repozitorijuma

```bash
git clone  https://github.com/nemanjanedeljkovicc/ParfemiNemanja.git
cd ParfemiNemanja
```

Ako koristis drugaciji remote URL, zameni ga svojim URL-om.

## 3. Instalacija backend zavisnosti

```bash
composer install
```

## 4. Instalacija frontend zavisnosti

```bash
npm install
```

## 5. Konfiguracija okruzenja (.env)

Ako `.env` ne postoji, napravi ga iz template fajla:

```bash
cp .env.example .env
```

Na Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Zatim u `.env` podesi sledece vrednosti:

```env
APP_NAME=Laravel
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=perfumes
DB_USERNAME=root
DB_PASSWORD=
```

Za kontakt formu i slanje mejlova potrebno je podesiti i mail konfiguraciju, na primer:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=vas_email@gmail.com
MAIL_PASSWORD=app_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=vas_email@gmail.com
MAIL_FROM_NAME="Parfemi Nemanja"
```

Napomena:

- kontakt forma koristi Laravel Mail za slanje poruke administratoru
- ukoliko je `MAIL_MAILER=log`, poruke se ne salju stvarno na email adresu vec se samo upisuju u log fajl
- za Gmail je potrebno koristiti `App Password`, a ne obicnu lozinku naloga

## 6. Generisanje app kljuca

```bash
php artisan key:generate
```

## 7. Baza i migracije

Projekat koristi MySQL bazu pod nazivom:

- `perfumes`

Bazu je potrebno kreirati u MySQL/phpMyAdmin okruzenju pre pokretanja migracija.

Zatim pokreni migracije i seedere:

```bash
php artisan migrate --seed
```

Ako zelis sve iz pocetka:

```bash
php artisan migrate:fresh --seed
```

Seederi automatski kreiraju:

- admin nalog
- user nalog
- kategorije
- brendove
- parfeme
- ostale pocetne podatke potrebne za testiranje aplikacije

## 8. Pokretanje projekta

### Opcija A - odvojeni terminali

Terminal 1 (Laravel server):

```bash
php artisan serve
```

Terminal 2 (Vite dev server):

```bash
npm run dev
```

### Opcija B - jednim komandnim pozivom (composer script)

```bash
composer run dev
```

Ova komanda paralelno pokrece server, queue listener, log watcher i Vite.

## 9. Build za produkciju

```bash
npm run build
```

## 10. Testovi

```bash
php artisan test
```

## 11. Kredencijali za testiranje

### Admin

- Email: `admin@gmail.com`
- Lozinka: `admin123`

### User

- Email: `user@gmail.com`
- Lozinka: `user12345`

## 12. Funkcionalnosti aplikacije

- registracija i prijava korisnika
- pregled parfema
- prikaz detalja proizvoda
- dodavanje proizvoda u korpu
- narucivanje proizvoda
- kontakt forma
- admin panel za upravljanje proizvodima, brendovima i kategorijama
- pregled porudzbina i logova

## 13. Struktura projekta

- `app/Http/Controllers` - kontroleri aplikacije
- `app/Models` - modeli
- `database/migrations` - migracije baze
- `database/seeders` - pocetni podaci
- `resources/views` - blade templejti
- `routes/web.php` - web rute
- `public` - javno dostupni fajlovi i staticki resursi

## 14. Dokumentacija

Dokumentacija je dostupna kroz aplikaciju putem fajla:

- `public/documentation.pdf`

## Ceste greske

- `Class ... not found`: pokreni `composer dump-autoload`
- `Vite manifest not found`: pokreni `npm run build` ili `npm run dev`
- `No application encryption key has been specified`: pokreni `php artisan key:generate`
- `DB greske`: proveri `.env` i da li je baza `perfumes` kreirana u MySQL/phpMyAdmin-u
