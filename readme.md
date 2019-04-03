# MartetPlace App 

### Instrucciones

		1. git clone repositorio
		2. cd project-name
		3. composer install 
		4. npm install
		5. Configurar .env con los datos de conección a la BD
		6. php artisan migrate
		7. php artisan serve

###API

#### 0. Autenticación
```
POST /api/login
```
Debe envía como parametros, el usuario y la contraseña, esto devolvera el token con el que podra hacer solicitudes post.

Ejemplo de salida:

    {
        "status": "success",
        "token": "token_alanumerico_con_estructura_jwt"
    }

Nota: El token debe enviar en la cabecera de cada solicitud, en especial las solicitudes que tengan alguna modificacion en la base de datos, [POST, PUT, DELETE].

Ejemplo:
```
GET /api/v1/product/
```
		Headers:
		Authorization: bearer token_alanumerico_con_estructura_jwt

####1. Obtener todas las categorías

```
GET /api/v1/category/
```
Ejemplo de salida:

    [
        {
            "id": 1,
            "name": "Bebidas",
            "description": "Categoría para Bebidas",
            "image": "default.jpg",
            "parent_id": 0,
            "deleted_at": null,
            "created_at": "2018-11-18 05:01:17",
            "updated_at": "2018-11-18 05:01:17"
        },
        {
            "id": 2,
            "name": "Comidas",
            "description": "Categoría para Comidas",
            "image": "default.jpg",
            "parent_id": 0,
            "deleted_at": null,
            "created_at": "2018-11-18 05:02:15",
            "updated_at": "2018-11-18 15:06:22"
        },
    ]

#### 2. Obtener una categoria especifica (n debe ser reemplazado por el id de la categoría)

```
GET /api/v1/category/n
```
Ejemplo de salida: 

    {
        "id": 1,
        "name": "Bebidas",
        "description": "Categoría para Bebidas",
        "image": "default.jpg",
        "parent_id": 0,
        "deleted_at": null,
        "created_at": "2018-11-18 05:01:17",
        "updated_at": "2018-11-18 05:01:17"
    }


#### 3. Obtener todos los productos
```
GET /api/v1/product/
```
Ejemplo de salida:

    [
        {
            "id": 1,
            "name": "Hamburguesa Sencilla",
            "image": null,
            "description": "Hamburguesa Sencilla",
            "price": "10000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 12:51:52",
            "updated_at": "2018-11-18 12:51:52"
        },
        {
            "id": 2,
            "name": "Pizza Personal",
            "image": null,
            "description": "Pizza Personal",
            "price": "750000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 13:01:01",
            "updated_at": "2018-11-18 13:09:17"
        },
    ]

Nota: Opcionalmente se puede pasar el parametro name por medio de la ruta y asi realizar una busqueda por ese termino, Ejemplo

```
GET /v1/product/?name=Ham
```
    
    [
        {
            "id": 1,
            "name": "Hamburguesa Sencilla",
            "image": null,
            "description": "Hamburguesa Sencilla",
            "price": "10000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 12:51:52",
            "updated_at": "2018-11-18 12:51:52"
        }
    ]


#### 4. Obtener un producto en especifico (n debe ser reemplazado por el id del producto)
```
GET /api/v1/product/n
```

Ejemplo de salida:

    {
        "id": 1,
        "name": "Hamburguesa Sencilla",
        "image": null,
        "description": "Hamburguesa Sencilla",
        "price": "10000",
        "category_id": 2,
        "deleted_at": null,
        "created_at": "2018-11-18 12:51:52",
        "updated_at": "2018-11-18 12:51:52"
    }

#### 5. Obtener todos los productos de una categoría (n debe ser reemplazado por el id de la categoría)
```
GET /api/v1/category/n/product
```

Ejemplo de salida:

    [
        {
            "id": 1,
            "name": "Hamburguesa Sencilla",
            "image": null,
            "description": "Hamburguesa Sencilla",
            "price": "10000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 12:51:52",
            "updated_at": "2018-11-18 12:51:52"
        },
        {
            "id": 2,
            "name": "Pizza Personal",
            "image": null,
            "description": "Pizza Personal",
            "price": "750000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 13:01:01",
            "updated_at": "2018-11-18 13:09:17"
        },
        {
            "id": 4,
            "name": "Pollo Frito",
            "image": null,
            "description": "Pollo Frito",
            "price": "20000",
            "category_id": 2,
            "deleted_at": null,
            "created_at": "2018-11-18 14:22:37",
            "updated_at": "2018-11-18 14:22:37"
        },
    ]

####6. Crear una orden de compra
```
POST /api/v1/order/
```
		Headers:
		Authorization: bearer token_alanumerico_con_estructura_jwt

body:

    {
    	"pay": "efectivo",
    	"products": [
    		{"product_id": 1, "quantity": 2},
    		{"product_id": 2, "quantity": 3}
    	]
    }


Ejemplo de salida: 

    {
        "pay": "efectivo",
        "user_id": 1,
        "updated_at": "2018-11-20 02:56:38",
        "created_at": "2018-11-20 02:56:38",
        "id": 8
    }


####7. Obtener ordenes de compra de un usuario en especifico.

```
GET /api/v1/order
```

    [
        {
            "id": 8,
            "user_id": 1,
            "pay": "efectivo",
            "deleted_at": null,
            "created_at": "2018-11-20 02:56:38",
            "updated_at": "2018-11-20 02:56:38",
            "products": [
                {
                    "id": 1,
                    "name": "Hamburguesa Sencilla",
                    "image": null,
                    "description": "Hamburguesa Sencilla",
                    "price": "10000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 12:51:52",
                    "updated_at": "2018-11-18 12:51:52",
                    "pivot": {
                        "order_id": 8,
                        "product_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "Pizza Personal",
                    "image": null,
                    "description": "Pizza Personal",
                    "price": "750000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 13:01:01",
                    "updated_at": "2018-11-18 13:09:17",
                    "pivot": {
                        "order_id": 8,
                        "product_id": 2
                    }
                }
            ]
        },
        {
            "id": 7,
            "user_id": 1,
            "pay": "efectivo",
            "deleted_at": null,
            "created_at": "2018-11-20 02:50:14",
            "updated_at": "2018-11-20 02:50:14",
            "products": [
                {
                    "id": 1,
                    "name": "Hamburguesa Sencilla",
                    "image": null,
                    "description": "Hamburguesa Sencilla",
                    "price": "10000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 12:51:52",
                    "updated_at": "2018-11-18 12:51:52",
                    "pivot": {
                        "order_id": 7,
                        "product_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "Pizza Personal",
                    "image": null,
                    "description": "Pizza Personal",
                    "price": "750000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 13:01:01",
                    "updated_at": "2018-11-18 13:09:17",
                    "pivot": {
                        "order_id": 7,
                        "product_id": 2
                    }
                }
            ]
        },
        {
            "id": 6,
            "user_id": 1,
            "pay": "efectivo",
            "deleted_at": null,
            "created_at": "2018-11-20 02:48:56",
            "updated_at": "2018-11-20 02:48:56",
            "products": [
                {
                    "id": 1,
                    "name": "Hamburguesa Sencilla",
                    "image": null,
                    "description": "Hamburguesa Sencilla",
                    "price": "10000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 12:51:52",
                    "updated_at": "2018-11-18 12:51:52",
                    "pivot": {
                        "order_id": 6,
                        "product_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "Pizza Personal",
                    "image": null,
                    "description": "Pizza Personal",
                    "price": "750000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 13:01:01",
                    "updated_at": "2018-11-18 13:09:17",
                    "pivot": {
                        "order_id": 6,
                        "product_id": 2
                    }
                }
            ]
        }
    ]


####8. Obtener una orden de compra en especifico (n debe ser reemplazado por el id de la orden)

```
GET /api/v1/order/n
```

    [
        {
            "id": 6,
            "user_id": 1,
            "pay": "efectivo",
            "deleted_at": null,
            "created_at": "2018-11-20 02:48:56",
            "updated_at": "2018-11-20 02:48:56",
            "products": [
                {
                    "id": 1,
                    "name": "Hamburguesa Sencilla",
                    "image": null,
                    "description": "Hamburguesa Sencilla",
                    "price": "10000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 12:51:52",
                    "updated_at": "2018-11-18 12:51:52",
                    "pivot": {
                        "order_id": 6,
                        "product_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "Pizza Personal",
                    "image": null,
                    "description": "Pizza Personal",
                    "price": "750000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 13:01:01",
                    "updated_at": "2018-11-18 13:09:17",
                    "pivot": {
                        "order_id": 6,
                        "product_id": 2
                    }
                }
            ]
        }
    ]

####9. Obtener Ordenes de compra del usuario logueado
```
GET /api/v1/orderbyuser/
```

    [
        {
            "id": 28,
            "user_id": 1,
            "pay": "efectivo",
            "deleted_at": null,
            "created_at": "2018-11-21 03:08:04",
            "updated_at": "2018-11-21 03:08:04",
            "products": [
                {
                    "id": 1,
                    "name": "Hamburguesa Sencilla",
                    "image": null,
                    "description": "Hamburguesa Sencilla",
                    "price": "10000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 12:51:52",
                    "updated_at": "2018-11-18 12:51:52",
                    "pivot": {
                        "order_id": 28,
                        "product_id": 1
                    }
                },
                {
                    "id": 2,
                    "name": "Pizza Personal",
                    "image": null,
                    "description": "Pizza Personal",
                    "price": "750000",
                    "category_id": 2,
                    "deleted_at": null,
                    "created_at": "2018-11-18 13:01:01",
                    "updated_at": "2018-11-18 13:09:17",
                    "pivot": {
                        "order_id": 28,
                        "product_id": 2
                    }
                }
            ]
        }
    ]

####10. PENDIENTES
