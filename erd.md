## ERD

```mermaid
classDiagram
	Category <--* Dish
	Dish <--* DishOrder
	Order <--* DishOrder
	
	class Category {
		+name string
		+dishes() hasMany
	}
	
	class Dish {
		+name string
		+description string
		+price int
		+picture string
		+category_id int
		+category() belongsTo
		+orders() belongsToMany
	}
	
	class Order {
		+customer_name string
		+table_number tinyint
		+payment_type tinyint
		+status tinyint
		+dishes() belongsToMany
	}
	
	class DishOrder {
		+quantity tinyint
		+price int
		+dish_id int
		+order_id int
		+dish() belongsTo
		+order() belongsTo
	}
```

