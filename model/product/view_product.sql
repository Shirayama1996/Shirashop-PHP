CREATE VIEW view_product AS 
SELECT product.*,
ROUND(
	IF(discount_percentage IS NULL 
		|| discount_from_date > CURRENT_DATE 
		|| discount_to_date < CURRENT_DATE ,
	 	price, 
		price * (1-discount_percentage/100)
	)
	/1000, 0) * 1000 AS sale_price 
FROM product;

-- 145000 giảm 15% => bán với giá 145000* 85% = 123,250 làm tròn thành 123,000

-- 123250 /1000 => 123.250  sau đó round sẽ ra 123. Sau nhân đó x1000 => 123,000.