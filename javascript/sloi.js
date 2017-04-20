// Массив, элементами которого являются
// айдишники альбомов:
var albums = ["album-1",  "album-2",  "album-3",  "album-4", 
			  "album-5",  "album-6",  "album-7",  "album-8", 
			  "album-9",  "album-10", "album-11", "album-12", 
			  "album-13", "album-14", "album-15", "album-16"];

// Функция, которая сделает видимым альбом
// под номером number:
function album_visible(number) 
{
	for(var i=1; i<=16; i++) 
	{
		if(i === number) 
		{
			document.getElementById(albums[i-1]).style.visibility='visible';				
		}
	}
}

// Функция, которая сделает НЕвидимым альбом
// под номером number:
function album_hidden(number)
{
	for(var i=1; i<=16; i++)
	{
		if(i === number)
		{
			document.getElementById(albums[i-1]).style.visibility='hidden';
		}
	}
}
