# Joomla-search-in-Edge
Joomla search in Edge browser only: accented characters are encoded and gives back empty result.

		á é í ó ő ú ű => Ăˇ Ă© Ă­ Ăł Ĺ‘ Ăş Ĺ±

Fix this bug: replace accented to unaccented characters in /components/com_search/controller.php
