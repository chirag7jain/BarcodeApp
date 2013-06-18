BarcodeApp
==========
Its a simple app to show how anyone can build a program to dynamically generate prn file for barcode label printing using a common template.

In this app I have a used a template which I use for my own business. The template is for a zebra printer. But this can be easily modified to use any label printer template and printer.

What is does is
1. It basically pulls product list for particular client The list has client barcode,price,mrp and product name for all the products relating to that client
2. User needs to add quantities he want for each barcode label against the product and then select printbarcode.
3. The user gets a prn file to download
4. The user needs to copy the prn file to the printer

The program has the Printer Template hardcoded - Functions.php

The advantage of this app
1. Have all the details regarding product in a database and no need to create label files that are both heavy on memory	and require a seperate application software to run them.
2. A issue I faced was that I had to manually open each file for printing and give print order for each. It required me to open each file in application and selecting the print option for each file one at a time. Here I can do the same job in just 2 or 3 steps for the entire list together.
