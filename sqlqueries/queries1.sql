select * from test;

create table customers(
    customer_id bigint(5) not null auto_increment,
    user_name varchar(100),
    password varchar(100),
    email varchar(100), 
    gender varchar(6),
    mobileno bigint(10),
    signup_date date,
    last_accessed date,
    pwd_modified date,
    last_ipaddr varchar(100),
     constraint cust_pk_cust_id primary key(customer_id)
)auto_increment=10000;


select * from customers;
select items_id,item_name,itemImgpath,itemcost,item_desc,payment from list_of_items;

select * from list_of_items where item_name like '%%';

select user_name,password,email,mobileno from customers where email='udaypolkampally@gmail.com' and password='nikil';

insert into customers (user_name,password,email,mobileno,gender,signup_date,last_accessed,pwd_modified,last_ipaddr) values()

insert into customers(user_name,pwd,email,mbno,gender,signup_date,last_accessed,pwd_modified,last_ipaddr) values 
('Udaykumar','nikil','udaypolkampally@gmail.com',9133030836,'Male',curdate(),curdate(),curdate(),'0:0:0:0:0:0:0:1')

select count(*) from customers where email='vweg' or mobileno= 6978

delete from customers where customer_id in(7,8);

desc customers;


update customers set password='',last_accessed=curdate(),pwd_modified=curdate(),last_ipaddr='' where email=''

alter table customers add imagePath varchar(300);

create table list_of_items(
    items_id bigint(5) not null auto_increment,
    item_name varchar(100),
    itemImgpath varchar(300),
    itemcost bigint(10),
    payment varchar(100),
    constraint list_it_id primary key(items_id)
)auto_increment=10000;

alter table list_of_items add item_desc varchar(10000);

select * from customers;
desc list_of_items;

insert into list_of_items(item_name,itemcost,item_desc,payment,itemImgpath) values('','','','','')

select items_id,item_name, from list_of_items where item_name like '%%';


select items_id,item_name from list_of_items where item_name like '%m%'


create table cart_wishlist(
    ct_wl_id bigint(5) not null auto_increment,
    itemid bigint(5),
    cust_id bigint(5),
    status int(1),
    constraint cart_wishlist_pk primary key(ct_wl_id),
    constraint cart_wishlist_item_fk foreign key(itemid) references list_of_items(items_id),
constraint cart_wishlist_cus_tfk foreign key(cust_id) references customers(customer_id)
)auto_increment=10000;

select * from cart_wishlist;
insert into cart_wishlist(itemid,cust_id,status) values()

select * from list_of_items where items_id in(select itemid from cart_wishlist where cust_id=9 and status=0)
select itemid from cart_wishlist where cust_id=9 and status=1;


select *,ct_wl_id from list_of_items l join cart_wishlist c on l.items_id=c.itemid and c.cust_id=9 and c.status=1; 

update cart_wishlist set status=0;

select count(itemid) from cart_wishlist where cust_id=9 and status=0
uninon
select count(itemid) from cart_wishlist where cust_id=9 and status=1;

select status,count(itemid)as count from cart_wishlist where cust_id=9 GROUP by status;

select * from address;
delete from orders;


select customer_id,user_name,password,email,gender,mobileno,imagePath from customers where customer_id=9

create table address(
    addr_id bigint(5) not null auto_increment,
    hno_street varchar(100),
    city varchar(100),
    dist varchar(100), 
    zip bigint(6),
    state varchar(100),
    last_addr DATETIME,
    customer_id bigint(5),
   constraint addr_addr_id primary key(addr_id),
    constraint addr_cust_id_fk foreign key(customer_id) references customers(customer_id)
)auto_increment=30000;

drop table address;

insert into address(customer_id,hno_street,city,dist,zip,state,last_addr) values(,'','','','','',now();

insert into address(customer_id,hno_street,city,dist,zip,state,last_addr) values
(9,'rajeev nagar','hyderabad','hyderabad','987456','telangana',curdate())

select addr_id,hno_street,city,dist,zip,state,customer_id from address where  customer_id=9 and addr_id=;

select addr_id,hno_street,city,dist,zip,state,customer_id from address where  customer_id=9 order by last_addr desc limit 1;

select * from address where customer_id=9 order by last_addr  desc limit 1;


create table orders(
    order_id bigint(5) not null auto_increment,
    addr_id bigint(5),
itemid bigint(5),
    order_date DATETIME,
    customer_id bigint(5),
   constraint order_order_id_pk primary key(order_id),
    constraint order_cust_id_fk foreign key(customer_id) references customers(customer_id),
 constraint order_addr_fk foreign key(addr_id) references address(addr_id),
constraint orders_item_fk foreign key(itemid) references list_of_items(items_id)
)auto_increment=40000;

insert into orders(addr_id,customer_id,itemid,order_date) values(,,,now())

drop table orders;

delete * from orders;

update cart_wishlist set status=03 WHERE cust_id= 
select * from cart_wishlist where cust_id=9;

select o.order_id,o.order_date,l.items_id,l.item_name,l.itemcost,l.itemImgpath,a.addr_id,a.hno_street,a.city,a.dist,a.zip,a.`state`
 from orders o join customers c on o.customer_id=c.customer_id join list_of_items l on o.itemid=l.items_id join 
address a on o.addr_id=a.addr_id where o.customer_id=9; 

delete from customers where customer_id=11;


delete from ;