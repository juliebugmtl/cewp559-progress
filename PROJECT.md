# E-Commerce Website project #

## Items ##

Endpoints:
# E-Commerce project #

To evaluate students based on the materials we have learned during this class, a final E-Commerce project is defined. The whole functioning project is defined as the deliverables for the project. 

The final project should have the following sections:

- [x] (05%) Categories view
- [x] (10%) Upon selection of a category, Products Catalog for that category
- [x] (05%) Single Product view
- [x] (05%) Add to Shopping Cart (matches demo site)
- [x] (05%) View Shopping Cart (Logged in User only)
- [x] (10%) Orders - Stored in DB in `Orders` and `OrderItems` tables (Logged in User only)
- [x] (10%) Payment gateway integration (Logged in User only)
- [x] (15%) User Authentication
- [ ] (10%) Search items - Full Text
- [ ] (15%) Administration (Only Admin can access it)
    - [ ] (06%) Items Management:
        - [x] (02%) Create New item + image (partly: needs category ID)
        - [ ] (02%) Update an existing item
        - [ ] (02%) Delete an exiting item
    - [ ] (06%) Categories Management:
        - [ ] (02%) Create New category + image
        - [ ] (02%) Update an existing category
        - [ ] (02%) Delete an existing category
    - [x] (03%) Create new user (via API endpoint)
- [ ] (10%) Unit-Tests, 10% code coverage for all Controllers and Models
- Front-End: Is described below
- Bonuses:
- [ ] (05%) Orders History (optional) (Logged in User only)
- [ ] (05%) Read Reviews for an item (_Optional = Bonus_)
- [ ] (05%) Add Reviews for an item (_Optional = Bonus_)
- [ ] (20%) Unit-Tests, above 50% code coverage for all Controllers and Models (_Optional = Bonus_)
- [ ] (30%) Unit-Tests, above 70% code coverage for all Controllers and Models (_Optional = Bonus_)

## Front-End ##

The front end of the application could be either of the following choices:

### 1 - Single Page Application & RESTful APIs ###

You can use the modern approach of making web sites and create a front-end which communicates with the back-end using the REST APIs.

### 2 - Generated pages using templating ###

You can also follow the traditional approach of building web applications and generate the HTML pages in the back-end. If you follow that approach, the HTML pages should follow templating rules.


## RESTful APIs ##

### Get all items ###

```
GET http://localhost/api/items
```

### Get one item by ID ###

```
GET http://localhost/api/items/{{ID}}
```
 where `{{ID}}` should be replaced by ID of the item you want to retrieve. For example:

 ```
 http://localhost/api/items/1
 ```

### Create a new Item ###

To create a new item you have to do an HTTP POST to the following endpoint:

```
POST http://localhost/api/items/
```

and you have to specify the `body` of the request as:

```
{
    "name": "Sample Book",
    "description": "Sample Book Description",
    "price": 23.45
}
```