BarcodeApp
==========
Its a simple app to show how anyone can build a program to dynamically generate prn file for barcode label printing using a common template.

In this app I have a used a template which I use for my own business. The template is for a zebra printer. But this can be easily modified to use any label printer template and printer.

What it does is
1. It basically pulls product list for particular client The list has client barcode,price,mrp and product name for all the products relating to that client
2. User needs to add quantities he want for each barcode label against the product and then select printbarcode.
3. The user gets a single prn file to download
4. The user needs to copy the prn file to the printer

The program has the 
    Printer Template hardcoded - prnLay.php
    PC & Printer Name - etcLay
