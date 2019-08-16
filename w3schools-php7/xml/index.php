<?php

// XML parsers Create Read Update and Delete XML documents

// Tree-based parsers hold entire document in memory and transform them into a tree structure, great for smaller XML files like DOM and SimpleXML

// Event-based parsers do not hold the entire document in Memory, instead, they read in one node at a time and allow you to interact with in real time. Once you move onto the next node, the old one is thrown away.
// Great for large documents like XMLReaders

// SimpleXML is a tree-based parser.

$myXMLData =
"<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

// The PHP simplexml_load_string() function is used to read XML data from a string.
$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
print_r($xml);

// SimpleXML is a PHP extension that allows us to easily manipulate and get XML data.
$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body . "<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
echo $xml->book[0]->title . "<br>";
echo $xml->book[1]->title . "<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
echo "<ul>";
foreach($xml->children() as $books){
  echo "<li>";
  echo $books->title . ", ";
  echo $books->author . ", ";
  echo $books->year . ", $";
  echo $books->price . ".";
  echo "</li>";
}
echo "</ul>";

// Initialize the XML parser
$parser=xml_parser_create();

// Function to use at the start of an element
function start($parser, $element_name, $element_attrs) {
  switch($element_name) {
    case "NOTE":
      echo "-- Note --<br>";
      break;
    case "TO":
      echo "To: ";
      break;
    case "FROM":
      echo "From: ";
      break;
    case "HEADING":
      echo "Heading: ";
      break;
    case "BODY":
      echo "Message: ";
  }
}

// Function to use at the end of an element
function stop($parser, $element_name) {
  echo "<br>";
}

// Function to use when finding character data
function char($parser,$data) {
  echo $data;
}

// Specify element handler
xml_set_element_handler($parser,"start","stop");

// Specify data handler
xml_set_character_data_handler($parser,"char");

// Open XML file
$fp=fopen("note.xml","r");

// Read data
while ($data=fread($fp,4096)) {
  xml_parse($parser,$data,feof($fp)) or 
  die (sprintf("XML Error: %s at line %d", 
  xml_error_string(xml_get_error_code($parser)),
  xml_get_current_line_number($parser)));
}

// Free the XML parser
xml_parser_free($parser);


// The built-in DOM parser makes it possible to process XML documents in PHP.
$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

print $xmlDoc->saveXML();