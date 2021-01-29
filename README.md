<h1>Hi this is the LDFSL Complete Repository</h1>

### Step By Step Install Of this project is 


```bash
//if any code is edited in server then  first use this
$ git stash 

//otherwise 
$ git pull 



$ composer install

$ php artisan migrate:fresh

$ php artisan passport:install

$ php artisan db:seed
```

Login Details 
* `User Name`  : admin@admin.com
*  `Password`  : password

Git Login
* `User Name`  : vnr.tumu@gmail.com
*  `Password`  : Sreevenky@41


### Export csv Command

```bash 
$ php artisan make:export BulkExport --model=Bulk

```
