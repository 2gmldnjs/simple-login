# simple-login


로그인 화면   
![image](https://github.com/2gmldnjs/simple-login/assets/69203345/c3e588ec-4d56-4ec3-acd6-fbe2324c3f73)


성공시   
![image](https://github.com/2gmldnjs/simple-login/assets/69203345/9376e9ef-b17b-471b-8f8f-3681582e12bc)



실패시   
![image](https://github.com/2gmldnjs/simple-login/assets/69203345/c9f7997e-5020-44d2-9f65-63b46557802c)


db   
create table member (   
id varchar(20) primary key,   
pw varchar(20) not null,   
name varchar(5) not null,   
birth datetime ,-- 생년월일   
gender varchar(1),     
email varchar(20),   
phone varchar(20) not null   
);   

로그인 테스트용   
insert into member values('abcd','1234','이이름','2023-12-30','남','abc@naver.com','01012341234');   
