# Recruitment Task 🧑‍💻👩‍💻

I will take the first section of readme to explain my approach to the task.


**1) Required endpoints (routes).**

I decided to create a set of minimal routes that gives the api user a better 
way to find correlated information about data. So the routes are:

```
Route::get('/invoice/list', [InvoiceController::class, 'list']);
Route::get('/invoice/list/{status}', [InvoiceController::class, 'listByStatus']);
Route::get('/invoice/{id}', [InvoiceController::class, 'getInvoice']);
Route::get('/invoice/approve/{id}', [InvoiceController::class, 'approve']);
Route::get('/invoice/reject/{id}', [InvoiceController::class, 'reject']);

Route::get('/company/list', [CompanyController::class, 'list']);
Route::get('/company/list/{name}', [CompanyController::class, 'listByName']);
Route::get('/company/{id}', [CompanyController::class, 'getCompany']);

Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/list/{name}', [ProductController::class, 'listByName']);
Route::get('/product/{id}', [ProductController::class, 'getProduct']);
```

Note: Above routes are not protected by authentication. I would add a middleware to protect them. 
However it was not a explicit requirement in the task. On a real world scenario I would add a 
middleware to protect the routes and a authentication system. In my opinion the best approach 
would be to use a JWT token system or a OAuth2 system for a loose authentication. For a tight 
authentication with a more human approuch may be I would prefer an Multi Step process like emailing 
a token to the user. the proper approuch should be discussed with the team. 

**2) Invoice Approval / Rejection**

I was unable to find a complete Invoice Validation logic on the project sources. What I found 
was a kind of mocking regarding this. Maybe I did miss something but I implemented the simple logic 
for Invoice Approval / Rejection.

```
Route::get('/invoice/approve/{id}', [InvoiceController::class, 'approve']);
Route::get('/invoice/reject/{id}', [InvoiceController::class, 'reject']);
```

**3) Unit Tests.**

For APIs a better alternative is Integration Tests since they test the whole functioning of the API public access and give the expected user results. I'm not saying Unit Tests are not important however given the shorten time I have to complete the tasks I decided for them. I implemented just a couple of basic tests but I think they are enough to show my skills. I would like to add more tests to the project but I think it is not the main focus of the task.

```
$ php artisan test --env=testing

   PASS  Tests\Feature\CompanyTest
  ✓ list
  ✓ list by name exists
  ✓ list by name not exists
  ✓ get company

   PASS  Tests\Feature\InvoiceTest
  ✓ list
  ✓ list by status
  ✓ get invoice
  ✓ get invoice approve
  ✓ get invoice reject

   PASS  Tests\Feature\ProductTest
  ✓ list
  ✓ list by name exists
  ✓ list by name not exists
  ✓ get product

  Tests:  13 passed
  Time:   0.28s
  ```

Well, I think that's it. I hope you enjoy my work. I'm looking forward to hear from you.

================================================

### Invoice module with approve and reject system as a part of a bigger enterprise system. Approval module exists and you should use it. It is Backend task, no Frontend is needed.
---
Please create your own repository and make it public or invite us to check it.


<table>
<tr>
<td>

- Invoice contains:
  - Invoice number
  - Invoice date
  - Due date
  - Company
    - Name 
    - Street Address
    - City
    - Zip code
    - Phone
  - Billed company
    - Name 
    - Street Address
    - City
    - Zip code
    - Phone
    - Email address
  - Products
    - Name
    - Quantity
    - Unit Price	
    - Total
  - Total price
</td>
<td>
Image just for visualization
<img src="https://templates.invoicehome.com/invoice-template-us-classic-white-750px.png" style="width: auto"; height:100%" />
</td>
</tr>
</table>

### TO DO:
Simple Invoice module which is approving or rejecting single invoice using information from existing approval module which tells if the given resource is approvable / rejectable. Only 3 endpoints are required:
```
  - Show Invoice data, like in the list above
  - Approve Invoice
  - Reject Invoice
```
* In this task you must save only invoices so don’t write repositories for every model/ entity.

* You should be able to approve or reject each invoice just once (if invoice is approved you cannot reject it and vice versa.

* You can assume that product quantity is integer and only currency is USD.

* Proper seeder is located in Invoice module and it’s named DatabaseSeeder

* In .env.example proper connection to database is established.

* Using proper DDD structure is preferred (with elements like entity, value object, repository, mapper / proxy, DTO) but not mandatory.
Unit tests in plus.

* Docker is in docker catalog and you need only do 
  ```
  ./start.sh
  ``` 
  to make everything work

  docker container is in docker folder. To connect with it just:
  ```
  docker compose exec workspace bash
  ``` 
