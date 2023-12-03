## Installation -

To install and run the project, follow these steps:

```bash
composer install
npm install
npm run dev
git rm --cached -r .idea/
```

How to add directory into gitignore:

```bash
.idea/
git rm --cached -r .idea/
```

How deploy code on server:
1. uncomment for production the assets into resources/sass/_custom.scss
2. comment the assets for local
3. set the url into .env file
```bash
APP_URL=https://webdev.pitb.gov.pk/knowledgehub
BASE_URL=https://webdev.pitb.gov.pk/knowledgehub
```
4. make build
```bash
npm run prod
```
5. add code into git
```bash
git add .
git commit -m "build-03-12-2023"
git push origin main
```
6. now build deploy on server
```bash
git push prod main
```
7. Note: be carefully server connect: if any issue cache and permission then connect tho server
```bash
ssh -p 8888 deploy-user@10.50.28.102
cd /var/www/vhosts/webdev/knowledgehub/
php artisan config:cache
sudo chmod 777 storage -Rf
```
