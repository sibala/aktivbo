# Aktivbo arbetstest

## Utvecklades i
- PHP 7.1
- Mysql 5.7.25
- Bootstrap
- jQuery
- Html/Css


## Användning
1. Ladda ner,
2. Importera databas.sql
3. Ställ in dina databas konfigurationer i app/config.php
4. Använd applikationen


## Uppgift
Målet med detta test är att skapa en liten förenklad delmodul likt den vi har i vårt produktionssystem.
1. Skapa en databas i PHP med namn ”aktivbo”
Skapa tabellen ”survey_respondents” med följande kolumner:
	1. RepondentID – Unikt ID som löpnummer
	2. FirstName – Text
	3. LastName – Text
	4. Address – Text
	5. E-mail – Text

2. Skapa ett frontend gränssnitt med följande features:
	1. Lista av alla respondenter och summering av antalet
	2. Lägga till respondenter
	3. Ta bort respondenter
	4. Ändra informationen på en respondent