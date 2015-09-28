<img src=http://s.natalian.org/2015-09-28/autofill2vcard.png alt="IOS9 screenshot of Autofill2Vcard">

Notice how we leverage these [autofill field
names](https://html.spec.whatwg.org/multipage/forms.html#autofill) to make
entering address details as simple as allowing the browser to autofill?

Using [Vcard 3.0](https://en.wikipedia.org/wiki/VCard)

Ensure mimetype is correctly setup upon your httpd:

	$ grep vcard /etc/nginx/mime.types
		text/vcard                            vcard;
