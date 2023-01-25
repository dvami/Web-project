from tkinter import simpledialog
from tkinter import *
import tkinter as tk
import tkinter.messagebox as Message
import mysql.connector
global A
global B
global C

def list_of_products(my_cursors,roots):
    my_cursors.execute("SELECT * FROM product")
    my_result = my_cursors.fetchall()
  
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("list_of_products")
    #first tow names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "id")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "price")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "name")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=3)
    e.insert(END, "id_for_category")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=4)
    e.insert(END, "discount")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])
            
               
                
               
                
        i=i+1
    rootss.mainloop()
    
    
def list_of_customers(my_cursors,roots):
    my_cursors.execute("SELECT * FROM profile")
    my_result = my_cursors.fetchall()
    rootss=tk.Tk()
    rootss.geometry("800x800")
    rootss.title("list_of_customer")
    
    #first row names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "firstname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "lastname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "city")
                
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=3)
    e.insert(END, "state")

    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=4)
    e.insert(END, "postno")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=5)
    e.insert(END, "id_for_customer")
    i=1
    #data
    for x in my_result: 
        
        for j in range(len(x)):
            
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])
            
              
                    
        i=i+1
    rootss.mainloop()
    
def list_of_categories(my_cursors,roots):
    my_cursors.execute("SELECT * FROM category")
    my_result = my_cursors.fetchall()
    rootss=tk.Tk()
    rootss.geometry("800x800")
    rootss.title("list_of_categories")
        #first row names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "id")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "url_for_onlineshop")
        
    i=1
    #data
    for x in my_result: 
        
        for j in range(len(x)):
            
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])
            
              
                    
        i=i+1
    rootss.mainloop()
    
    
def list_of_invoice(my_cursors,roots):
    my_cursors.execute("SELECT *FROM invoice")
    my_result = my_cursors.fetchall()
    rootss=tk.Tk()
    rootss.geometry("800x800")
    rootss.title("list_of_invoice")
    #first row names
    e = Entry(rootss, width=25, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "id")
    
    e = Entry(rootss, width=25, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "id_for_customer")
    
    e = Entry(rootss, width=25, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "id_for_payment")
    e = Entry(rootss, width=25, fg='green') 
    e.grid(row=0,column=3)
    e.insert(END, "date&time")
    i=1
    #data
    for x in my_result: 
        
        for j in range(len(x)):
            
                e = Entry(rootss, width=25, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])
            
              
        i=i+1
    rootss.mainloop()
def list_of_hot_offers(my_cursors,roots):
    my_cursors.execute("SELECT * FROM product WHERE discount>=15")
    my_result = my_cursors.fetchall()
  
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("list_of_hot_offers")
    #first tow names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "id")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "price")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "name")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=3)
    e.insert(END, "id_for_category")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=4)
    e.insert(END, "discount")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])
            
               
                
               
                
        i=i+1
    rootss.mainloop()

    
def list_of_providers_of_a_product(my_cursors,roots)  :
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("list_of_providers of a product")
    A = simpledialog.askstring(title="product name",prompt="Name of product:")
    A=str("'"+A+"'")
    
    my_cursors.execute("SELECT provider.name,provider.id FROM provider INNER JOIN product p ON p.name ="+ A+" INNER JOIN product_provider q ON q.id_for_product=p.id WHERE provider.id=q.id_for_provider")
    my_result = my_cursors.fetchall()
  
    
   
                #first tow names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "id")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def cheapest_provider(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("cheapest provider")
    A = simpledialog.askstring(title="product name",prompt="Name of product:")

 
    A=str("'"+A+"'")
    
    my_cursors.execute("SELECT provider.name,provider.id FROM provider INNER JOIN product p ON p.name ="+A+"  INNER JOIN product_provider q ON q.id_for_product=p.id  WHERE provider.id=q.id_for_provider and  p.price=( SELECT MIN(product.price) FROM product WHERE product.name="+A+")")


    my_result = my_cursors.fetchall()
  
    
   
                #first tow names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "id")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def best_selling_product_of_month(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("best selling product of month")
    A = simpledialog.askstring(title="Month Number",prompt="Month Number:")
    A=str("'"+A+"'") 
    B = simpledialog.askstring(title="Year Number",prompt="Year Number:")
    B=str("'"+B+"'")
    my_cursors.execute("SELECT  product.name , sum(product.price) from product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where month(s.date)="+ A + " and year(s.date)="+ B+"group  by product.name order by sum(product.price)DESC limit 1")  

    my_result = my_cursors.fetchall()
   #first tow names
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "sum of sells")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def best_selling_product_of_week(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("best selling product of week")
    my_cursors.execute("SELECT  product.name , sum(product.price) from product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id  WHERE YEARWEEK(s.date) = YEARWEEK(NOW() - INTERVAL 1 WEEK) group  by product.name order by sum(product.price)DESC limit 1 ")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "sum of sells")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def best_customer_of_month(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("best customer of month")
    A = simpledialog.askstring(title="Month Number",prompt="Month Number:")
    A=str("'"+A+"'") 
    B = simpledialog.askstring(title="Year Number",prompt="Year Number:")
    B=str("'"+B+"'")
    
    my_cursors.execute("SELECT x.firstname ,x.lastname, sum(product.price) from profile as x,product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where month(s.date)="+A+" and year(s.date)="+B+" and s.id_for_customer=x.id_for_customer group   by x.id_for_customer order by sum(product.price)DESC limit 1  ")  
    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "firstname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "lastname")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "sum of buy")
    
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def best_customer_of_week(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("best customer of week")
    my_cursors.execute("SELECT x.firstname ,x.lastname , sum(product.price) from profile as x,product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where YEARWEEK(s.date) = YEARWEEK(NOW() - INTERVAL 1 WEEK) and s.id_for_customer=x.id_for_customer group   by x.id_for_customer order by sum(product.price)DESC limit 1 ")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "firstname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "lastname")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "sum of buy")
    
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def last_ten_order_of_customer(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("last 10 order")
    A = simpledialog.askstring(title="Id Number",prompt="Id Number:")
    A=str("'"+A+"'") 
    my_cursors.execute("SELECT x.firstname ,x.lastname,product.name,product.price ,product.id from profile as x,product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where   s.id_for_customer=x.id_for_customer and x.id_for_customer= "+A+"order by s.date desc limit 10 ")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "firstname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "lastname")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "product name")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=3)
    e.insert(END, "price")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=4)
    e.insert(END, "id")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def comments(my_cursors,roots):
    
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("comments")
    A = simpledialog.askstring(title="product name",prompt="prdouct name:")
    A=str("'"+A+"'") 
    my_cursors.execute("  SELECT  opinion.opinion,opinion.rate  from opinion INNER JOIN product p ON p.id=opinion.id_for_product  where p.name="+A)  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "opinion")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "rate")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def top_three_comments(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("top three comments")
    A = simpledialog.askstring(title="product name",prompt="prdouct name:")
    A=str("'"+A+"'") 
    my_cursors.execute("  SELECT  opinion.opinion,opinion.rate  from opinion INNER JOIN product p ON p.id=opinion.id_for_product  where p.name="  +A+"order by opinion.rate desc limit 3")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "opinion")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "rate")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def worst_three_comments(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("worst three comments")
    A = simpledialog.askstring(title="product name",prompt="prdouct name:")
    A=str("'"+A+"'") 
    my_cursors.execute("  SELECT  opinion.opinion,opinion.rate  from opinion INNER JOIN product p ON p.id=opinion.id_for_product  where p.name="  +A+"order by opinion.rate asc limit 3")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "opinion")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "rate")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def sell_of_a_product(my_cursors,toots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("sell of a product")
    A = simpledialog.askstring(title="Month",prompt="Month number:")
    A=str("'"+A+"'") 
    B = simpledialog.askstring(title="year",prompt="Year number:")
    B=str("'"+B+"'") 
    C = simpledialog.askstring(title="product name",prompt="prdouct name:")
    C=str("'"+C+"'") 
    my_cursors.execute("SELECT  product.name  , sum(product.price) from product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where month(s.date)="+A+" and year(s.date)="+B+"  and product.name="+C+"group  by product.name order by sum(product.price)")  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "product name")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "sum")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def avg_shop_sell(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("avg sell of a shop")
    A = simpledialog.askstring(title="Month",prompt="Month number:")
    A=str("'"+A+"'") 
    my_cursors.execute("SELECT   sum(product.price),avg(product.price) from product INNER JOIN shoppingcart_product p ON p.id_for_poduct=product.id INNER JOIN shopping_cart q On p.id_for_shoppingcart=q.id  INNER JOIN payment r on r.id_for_shoppingcart=q.id INNER JOIN invoice s on s.id_for_payment=r.id where month(s.date)="+A)  

    my_result = my_cursors.fetchall()
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "sum shop sell")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "avg sell")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def same_city_customer(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("same city customers")
    A = simpledialog.askstring(title="city",prompt="city name:")
    A=str("'"+A+"'")
    my_cursors.execute("SELECT profile.firstname,profile.lastname ,profile.id_for_customer from profile where city="+A)  

    my_result = my_cursors.fetchall() 
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "firsttname")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "lastname")
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=2)
    e.insert(END, "customer id")
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
def same_city_providers(my_cursors,roots):
    rootss=tk.Tk()
    rootss.geometry("600x600")  
    rootss.title("same city providers")
    A = simpledialog.askstring(title="city",prompt="city name:")
    A=str("'"+A+"'")
    my_cursors.execute("SELECT provider.id ,provider.name from provider where city="+A)  

    my_result = my_cursors.fetchall() 
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=0)
    e.insert(END, "id")
    
    e = Entry(rootss, width=16, fg='green') 
    e.grid(row=0,column=1)
    e.insert(END, "name")
     
    i=1
    for x in my_result: 
        for j in range(len(x)):
            
             
                e = Entry(rootss, width=16, fg='red') 
                e.grid(row=i, column=j) 
                e.insert(END, x[j])   
                
        i=i+1
    rootss.mainloop()
root=tk.Tk()
root.geometry("600x600")  
root.title("m")
mydb=mysql.connector.connect(host='localhost',username='root',password="1234",database='mydb')

if(mydb.is_connected):print("Cnnected")
my_cursor=mydb.cursor()


button1 = tk.Button(root,text="list of products",command=lambda :list_of_products(my_cursor,root),width=15,height=1)
button1.place(x=0, y=0)

button2 = tk.Button(root,text="list of customers",command=lambda:list_of_customers(my_cursor,root),width=15,height=1)
button2.place(x=120, y=0)

button3 = tk.Button(root,text="list of categories",command=lambda:list_of_categories(my_cursor,root),width=15,height=1)
button3.place(x=240, y=0)

button4 = tk.Button(root,text="list of invoice",command=lambda:
    list_of_invoice(my_cursor,root),width=15,height=1)
button4.place(x=360, y=0)

button5 = tk.Button(root,text="hot offer profucts",command=lambda:list_of_hot_offers(my_cursor,root),width=15,height=1)
button5.place(x=480, y=0)

button6 = tk.Button(root,text="provider of a product",command=lambda:list_of_providers_of_a_product(my_cursor,root),width=15,height=1)
button6.place(x=0, y=30)

button7 = tk.Button(root,text="cheapest provider",command=lambda:cheapest_provider(my_cursor,root),width=15,height=1)
button7.place(x=120, y=30)

button8 = tk.Button(root,text="top sell of month",command=lambda:best_selling_product_of_month(my_cursor,root),width=15,height=1)
button8.place(x=240, y=30)

button9 = tk.Button(root,text="top sell of week",command=lambda:best_selling_product_of_week(my_cursor,root),width=15,height=1)
button9.place(x=360, y=30)
button10 = tk.Button(root,text="customer of month",command=lambda:best_customer_of_month(my_cursor,root),width=15,height=1)
button10.place(x=480, y=30)
button11 = tk.Button(root,text="customer of week",command=lambda:best_customer_of_week(my_cursor,root),width=15,height=1)
button11.place(x=0, y=60)
button12 = tk.Button(root,text="last 10 order",command=lambda:last_ten_order_of_customer(my_cursor,root),width=15,height=1)
button12.place(x=120, y=60)
button13 = tk.Button(root,text="product comments",command=lambda:comments(my_cursor,root),width=15,height=1)
button13.place(x=240, y=60)
button14 = tk.Button(root,text="top 3 comments",command=lambda:top_three_comments(my_cursor,root),width=15,height=1)
button14.place(x=360, y=60)
button15 = tk.Button(root,text="worst 3 comments",command=lambda:worst_three_comments(my_cursor,root),width=15,height=1)
button15.place(x=480, y=60)
button16 = tk.Button(root,text="sell of a product",command=lambda:sell_of_a_product(my_cursor,root),width=15,height=1)
button16.place(x=0, y=90)
button17 = tk.Button(root,text="avg shop sell",command=lambda:avg_shop_sell(my_cursor,root),width=15,height=1)
button17.place(x=120, y=90)
button18 = tk.Button(root,text="same city customers",command=lambda:same_city_customer(my_cursor,root),width=15,height=1)
button18.place(x=240, y=90)
button19 = tk.Button(root,text="same city providers",command=lambda:same_city_providers(my_cursor,root),width=15,height=1)
button19.place(x=360, y=90)
root.mainloop()






 