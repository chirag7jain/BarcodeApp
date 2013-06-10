barcodeApp
==========
Important - The database structure isn't clearly explained in the program and it will be improved in future commits.
But even an average programmer can easily understand it by going through the program. The current state of the program
is that it is build to be used in windows environment but can be easily modified to be used in linux. There are two 
things that are windows specific that is the template '/r/n part' and the batch file.

Its a simple app to show how anyone can build a program to dynamically generate prn files for barcode label printing
using a common template.

In this app I have a used a template which I use for my own business. The template is for a zebra printer. But this can
be easily modified to use any label making printer template and printer.

What is does is
1. It basically pulls product list for particular client
      The list has client barcode,price,mrp and product name for all the products relating to that client
2. User needs to add quantities he want for each barcode label against the product and then select printbarcode.
3. The user gets a zip file to download containing all his barcode label prns file and a batch file.
4. The user needs to extract the zip file to an empty folder and execute the batch file.

The program currently has certain hardcoded values and ones must change then for ones own computer and printer.

There are other portion that have hardcode value
  makeForm.js
  index.php
  functions.php - the template

These things are still underdevelopment but this was mainly intended to show that how easy its to build an app that can
make barcode label printing easy and quick. No need to buy unwanted wasteful and expensive software to do the same.

The advantage of this app
1. Have all the details regarding product in a database and no need to create label files that are both heavy on memory
and require a seperate application software to run them.
2. A issue I faced was that I had to manually open each file for printing and give print order for each. It required me
to open each file in application and selecting the print option for each file one at a time. Here I can do the same job
in just 2 or 3 steps for the entire list together.
