Instalasi

1. Install package
```bash
composer install
```
2. Buat file .env
```bash
cp .env.example .env
```
3. Generate application key
```bash
php artisan key:generate
```
4. Konfigurasi file .env
```bash
VCLAIM_BASE_URL=https://apijkn.bpjs-kesehatan.go.id/vclaim-rest/
VCLAIM_SERVICE_NAME=vclaim-rest
VCLAIM_CONSUMER_ID=
VCLAIM_CONSUMER_SECRET=
VCLAIM_USER_KEY=
```
5. Konfigurasi BpjsController.php
```bash
private $baseEndpoint = 'http://[YOUR PUBLIC IP]/webservice/registrasionline/bpjs';
/**
 * Hospital GPS coordinates.
 */
private $hospitalLat =  -3.522521513090456; //latitude
private $hospitalLng = 115.95749914249028; //longitude
private $allowedRadius = 1200;

/**
 * Function to fetch the token.
 */
public function getToken()
{
    $response = Http::withHeaders([
        'x-username' => '', //username dr tabel signature
        'x-password' => '', //password
        'Accept' => 'application/json',
    ])->get("{$this->baseEndpoint}/getToken");

    if ($response->successful()) {
        $data = $response->json();
        if (isset($data['response']['token'])) {
            return $data['response']['token'];
        }
    }

    return null;
}
```

Be happy!