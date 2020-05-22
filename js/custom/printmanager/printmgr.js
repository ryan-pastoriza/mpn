function printJ(attr){
	var styles = "<style>\
	table {\
	  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;\
	  border-collapse: collapse;\
	  width: 100%;\
	}\
	table td, table th {\
	  border: 1px solid #ddd;\
	  padding: 8px;\
	}\
	table tr:nth-child(even){background-color: #f2f2f2;}\
	table tr:hover {background-color: #ddd;}\
	table th {\
	  padding-top: 12px;\
	  padding-bottom: 12px;\
	  text-align: left;\
	  // background-color: silver !important;\
	  color: black;\
	}\
	</style>";
    w=window.open();
    w.document.write("<center><h5 style='font-family: Roboto;'>Managing Promissory Note</h5></center>");
    w.document.write("<h1 style='font-family: Roboto;'>Managing Promissory Note</h1>");
    w.document.write(styles);
    w.document.write($(attr).html());
    w.print();
    w.close();
}