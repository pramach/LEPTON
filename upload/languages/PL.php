<?php

/**
 * This file is part of LEPTON Core, released under the GNU GPL
 * Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
 *
 * NOTICE:LEPTON CMS Package has several different licenses.
 * Please see the individual license in the header of each single file or info.php of modules and templates.
 *
 * @author          LEPTON Project
 * @copyright       2004-2010 Website Baker Project
 * @copyright       2010-2016 LEPTON Project
 * @link            http://www.LEPTON-cms.org
 * @license         http://www.gnu.org/licenses/gpl.html
 * @license_terms   please see LICENSE and COPYING files in your package
 * @Translation     ksocial
 *
 */


// include class.secure.php to protect this file and the whole CMS!
if (defined('LEPTON_PATH')) {
	include(LEPTON_PATH.'/framework/class.secure.php');
} else {
	$oneback = "../";
	$root = $oneback;
	$level = 1;
	while (($level < 10) && (!file_exists($root.'/framework/class.secure.php'))) {
		$root .= $oneback;
		$level += 1;
	}
	if (file_exists($root.'/framework/class.secure.php')) {
		include($root.'/framework/class.secure.php');
	} else {
		trigger_error(sprintf("[ <b>%s</b> ] Can't include class.secure.php!", $_SERVER['SCRIPT_NAME']), E_USER_ERROR);
	}
}
// end include class.secure.php



// Define that this file is loaded
if(!defined('LANGUAGE_LOADED')) {
	define('LANGUAGE_LOADED', true);
}

// Set the language information
$language_directory = 'PL';
$language_code = 'pl';
$language_name = 'Polski';
$language_version = '2.1';
$language_platform = '2.x';
$language_author = 'Marek Stepien, Krzysztof Winnicki';
$language_license = 'GNU General Public License';
$language_guid = '1e84df1e-850d-4782-86a8-e560e7ebb90f';

$MENU = array(
'ACCESS' =>  'Dostęp',
'ADDON' =>  'Dodatek',
'ADDONS' =>  'Dodatki',
'ADMINTOOLS' =>  'Narzędzia admina',
'BREADCRUMB' 			=> 'Jesteś tutaj: ',
'FORGOT' =>  'Odzyskaj dane logowania',
'GROUP' =>  'Groupa',
'GROUPS' =>  'Grupy',
'HELP' =>  'Pomoc',
'LANGUAGES' =>  'Języki',
'LOGIN' =>  'Zaloguj się',
'LOGOUT' =>  'Wyloguj',
'MEDIA' =>  'Media',
'MODULES' =>  'Moduły',
'PAGES' =>  'Strony',
'PREFERENCES' =>  'Preferencje',
'SETTINGS' =>  'Ustawienia',
'START' =>  'Początek',
'TEMPLATES' =>  'Szablony',
'USERS' =>  'Użytkownicy',
'VIEW' =>  'Podgląd',
'SERVICE'				=> 'Usługa'
); // $MENU

$TEXT = array(
'ACCOUNT_SIGNUP' =>  'Nowe konto',
'ACTION_NOT_SUPPORTED'	=> 'Akcja nie jest obsługiwana',
'ACTIONS' =>  'Czynności',
'ACTIVE' =>  'Aktywne',
'ADD' =>  'Dodaj',
'ADDON' =>  'Dodatek',
'ADD_SECTION' =>  'Dodaj sekcję',
'ADMIN' =>  'Administrator',
'ADMINISTRATION' =>  'Administracja',
'ADMINISTRATION_TOOL' =>  'Narzędzie administracyjne',
'ADMINISTRATOR' =>  'Administrator',
'ADMINISTRATORS' =>  'Administratorzy',
'ADVANCED' =>  'Zaawansowane',
'ALLOWED_FILETYPES_ON_UPLOAD' =>  'Dozwolone pliki do uploadu',
'ALLOWED_VIEWERS' =>  'Dozwoleni obserwatorzy',
'ALLOW_MULTIPLE_SELECTIONS' =>  'Pozwól na wielokrotne wybory',
'ALL_WORDS' =>  'Wszystkie slowa',
'ANCHOR' =>  'Kotwica',
'ANONYMOUS' =>  'Anonimowy',
'ANY_WORDS' =>  'Dowolne ze slów',
'APP_NAME' =>  'Nazwa aplikacji',
'ARE_YOU_SURE' =>  'Czy aby na pewno?',
'AUTHOR' =>  'Autor',
'BACK' =>  'Wstecz',
'BACKUP' =>  'Kopia zapasowa',
'BACKUP_ALL_TABLES' =>  'Kopia zapasowa wszystkich tabel',
'BACKUP_DATABASE' =>  'Kopia zapasowa bazy danych',
'BACKUP_MEDIA' =>  'Kopia zapasowa mediów',
'BACKUP_WB_SPECIFIC' =>  'Kopia zapasowa tylko tabel LP_',
'BASIC' =>  'Podstawowe',
'BLOCK' =>  'Blokuj',
'BACKEND_TITLE'	=>	'Backendtitle',
'CALENDAR' =>  'Kalendarz',
'CANCEL' =>  'Anuluj',
'CAN_DELETE_HIMSELF' =>  'Można usunąć siebie',
'CAPTCHA_VERIFICATION' =>  'Weryfikacja Captcha',
'CAP_EDIT_CSS' =>  'Edytuj CSS',
'CHANGE' =>  'Zmień,',
'CHANGES' =>  'Zmiany',
'CHANGE_SETTINGS' =>  'Zmień ustawienia',
'CHARSET' =>  'Kodowanie znaków',
'CHECKBOX_GROUP' =>  'Grupa pól zaznaczanych',
'CLOSE' =>  'Zamknij',
'CODE' =>  'Kod',
'CODE_SNIPPET' =>  'Kod snippeta',
'COLLAPSE' =>  'Zwiń,',
'COMMENT' =>  'Komentarz',
'COMMENTING' =>  'Komentowanie',
'COMMENTS' =>  'Komentarze',
'CREATE_FOLDER' =>  'Utwórz folder',
'CURRENT' =>  'Bieżacy',
'CURRENT_FOLDER' =>  'Bieżacy folder',
'CURRENT_PAGE' =>  'Bieżąca strona',
'CURRENT_PASSWORD' =>  'Bieżące hasło',
'CUSTOM' =>  'Własny',
'DATABASE' =>  'Baza danych',
'DATE' =>  'Data',
'DATE_FORMAT' =>  'Format daty',
'DEFAULT' =>  'Domyślne',
'DEFAULT_CHARSET' =>  'Domyślne kodowanie znaków',
'DEFAULT_TEXT' =>  'Domyślny tekst',
'DELETE' =>  'Usuń',
'DELETED' =>  'Usunięte',
'DELETE_DATE' =>  'Usuń datę',
'DELETE_ZIP' =>  'Usun archiwum zip po rozpakowaniu',
'DESCRIPTION' =>  'Opis',
'DESIGNED_FOR' =>  'Zaprojektowane dla',
'DIRECTORIES' =>  'Katalogi',
'DIRECTORY_MODE' =>  'Tryb katalogów',
'DISABLED' =>  'Wyłączone',
'DISPLAY_NAME' =>  'Nazwa',
'EMAIL' =>  'E-mail',
'EMAIL_ADDRESS' =>  'Adres e-mail',
'EMPTY_TRASH' =>  'Opróznij śmietnik',
'ENABLE_JAVASCRIPT'		=> "Proszę włączyć JavaScript aby użyć tej formy.",
'ENABLED' =>  'Włączone',
'END' =>  'Koniec',
'ERROR' =>  'Bład',
'EXACT_MATCH' =>  'Dopasowanie dokładne',
'EXECUTE' =>  'Wykonaj',
'EXPAND' =>  'Rozwiń',
'EXTENSION' =>  'Rozszerzenie',
'FIELD' =>  'Pole',
'FILE' =>  'plik',
'FILES' =>  'pliki',
'FILESYSTEM_PERMISSIONS' =>  'Uprawnienia systemu plików',
'FILE_MODE' =>  'Tryb plików',
'FINISH_PUBLISHING' =>  'Zakończ publikowanie',
'FOLDER' =>  'folder',
'FOLDERS' =>  'foldery',
'FOOTER' =>  'Stopka',
'FORGOTTEN_DETAILS' =>  'Zapomniałeś(-aś) hasła?',
'FORGOT_DETAILS' =>  'Zapomniałeś(-aś) szczególów?',
'FROM' =>  'Od',
'FRONTEND' =>  'Panel przedni',
'FULL_NAME' =>  'Imie i nazwisko',
'FUNCTION' =>  'Funkcja',
'GROUP' =>  'Grupa',
'HEADER' =>  'Naglówek',
'HEADING' =>  'Naglówek',
'HEADING_CSS_FILE' =>  'Aktualny plik modułu: ',
'HEIGHT' =>  'Wysokość,',
'HELP_LEPTOKEN_LIFETIME'		=> 'w sekundach, 0 znaczy brak ochrony CSRF!',
'HELP_MAX_ATTEMPTS'		=> 'Kiedy przykroczysz tę ilość, nie będzie możliwe zalogowanie w tej sesji.',
'HIDDEN' =>  'Ukryty',
'HIDE' =>  'Schowaj',
'HIDE_ADVANCED' =>  'Schowaj opcje zaawansowane',
'HOME' =>  'Strona domowa',
'HOMEPAGE_REDIRECTION' =>  'Przekierowanie strony domowej',
'HOME_FOLDER' =>  'Osobisty Folder',
'HOME_FOLDERS' =>  'Osobiste Foldery',
'HOST' =>  'Host',
'ICON' =>  'Ikona',
'IMAGE' =>  'Obrazek',
'INLINE' =>  'Inline',
'INSTALL' =>  'Zainstaluj',
'INSTALLATION' =>  'Instalacja',
'INSTALLATION_PATH' =>  'Ścieżka instalacji',
'INSTALLATION_URL' =>  'URL instalacji',
'INSTALLED' =>  'zainstalowano',
'INTRO' =>  'Intro',
'INTRO_PAGE' =>  'Strona wprowadzająca',
'INVALID_SIGNS' =>  'musi zaczynać się od litery badź niedozwolonych znaków',
'KEYWORDS' =>  'słowa kluczowe',
'LANGUAGE' =>  'Język',
'LAST_UPDATED_BY' =>  'Ostatnio zmienione przez',
'LENGTH' =>  'Długość',
'LEPTOKEN_LIFETIME'		=> 'Leptoken czas',
'LEVEL' =>  'Poziom',
'LIBRARY'				=> 'Biblioteka',
'LICENSE'				=> 'Licencja',
'LINK' =>  'Odnośnik',
'LINUX_UNIX_BASED' =>  'oparty na Linux/Unix',
'LIST_OPTIONS' =>  'Listuj opcje',
'LOGGED_IN' =>  'Zalogowany',
'LOGIN' =>  'Zaloguj',
'LONG' =>  'Długi',
'LONG_TEXT' =>  'Długi tekst',
'LOOP' =>  'Petla',
'MAIN' =>  'Glówny',
'MANAGE' =>  'Zarządzaj',
'MANAGE_GROUPS' =>  'Zarządzaj grupami',
'MANAGE_USERS' =>  'Zarządzaj użytkownikami',
'MATCH' =>  'Dopasuj',
'MATCHING' =>  'Pasujące',
'MAX_ATTEMPTS'		=> 'Dopuszczalna ilość błędnych prób logowania',
'MAX_EXCERPT' =>  'Maksymalny fragment linii',
'MAX_SUBMISSIONS_PER_HOUR' =>  'Maks. zgloszeń na godzinę',
'MEDIA_DIRECTORY' =>  'Folder mediów',
'MENU' =>  'Menu',
'MENU_ICON_0' =>  'Menu-Icon normal',
'MENU_ICON_1' =>  'Menu-Icon hover',
'MENU_TITLE' =>  'Tytuł menu',
'MESSAGE' =>  'Wiadomość',
'MODIFY' =>  'Zmień',
'MODIFY_CONTENT' =>  'Zmień zawartość',
'MODIFY_SETTINGS' =>  'Zmień ustawienia',
'MODULE_ORDER' =>  'moduł- kolejność wyszukiwania',
'MODULE_PERMISSIONS' =>  'Uprawnienia do modułów',
'MORE' =>  'Więcej',
'MOVE_DOWN' =>  'W dól',
'MOVE_UP' =>  'Do góry',
'MULTIPLE_MENUS' =>  'Wielokrotne menu',
'MULTISELECT' =>  'Wybór wielokrotny',
'NAME' =>  'Nazwa',
'NEED_CURRENT_PASSWORD' =>  'Potwierdź obecne hasło',
'NEED_PASSWORD_TO_CONFIRM' => 'Proszę potwierdzić zmiany z bieżącym hasłem',
'NEED_TO_LOGIN' =>  'Potrzebujesz się zalogować?',
'NEW_PASSWORD' =>  'Nowe hasło',
'NEW_USER_HINT'			=> 'Minimalna długość nazwy użytkownika: %d znaków, Minimalna długość dla hasła: %d znaków!',
'NEW_WINDOW' =>  'Nowe okno',
'NEXT' =>  'Następny',
'NEXT_PAGE' =>  'Następna strona',
'NO' =>  'Nie',
'NONE' =>  'Brak',
'NONE_FOUND' =>  'Nie odnaleziono',
'NOT_FOUND' =>  'Nie odnaleziono',
'NOT_INSTALLED' =>  'nie zainstalowano',
'NO_IMAGE_SELECTED' =>  'nie wybrano obrazu',
'NO_RESULTS' =>  'Brak wyników',
'OF' =>  'z',
'ON' =>  'dnia',
'OPEN' =>  'Otwórz',
'OPTION' =>  'Opcja',
'OTHERS' =>  'Inni',
'OUT_OF' =>  'z poza',
'OVERWRITE_EXISTING' =>  'Nadpisz istniejący(-e)',
'PAGE' =>  'Strona',
'PAGES_DIRECTORY' =>  'Folder stron',
'PAGES_PERMISSION' =>  'Prawa do strony',
'PAGES_PERMISSIONS' =>  'Prawa do stron',
'PAGE_EXTENSION' =>  'Rozszerzenie strony',
'PAGE_ICON' =>  'Obrazek strony',
'PAGE_ID'      => 'ID strony',
'PAGE_LANGUAGES' =>  'Jezyki stron',
'PAGE_LEVEL_LIMIT' =>  'Limit poziomów stron',
'PAGE_SPACER' =>  'Odstęp strony',
'PAGE_TITLE' =>  'Tytuł strony',
'PAGE_TRASH' =>  'Śmietnik stron',
'PARENT' =>  'Nadrzędny',
'PASSWORD' =>  'Hasło',
'PATH' =>  'Ścieżka',
'PHP_ERROR_LEVEL' =>  'Poziom raportowania błędów PHP',
'PLEASE_LOGIN' =>  'Podaj login',
'PLEASE_SELECT' =>  'Proszę wybrać',
'POST' =>  'Wiadomość',
'POSTS_PER_PAGE' =>  'Wiadomości na stronę',
'POST_FOOTER' =>  'Stopka wiadomości',
'POST_HEADER' =>  'Naglówek wiadomości',
'PREVIOUS' =>  'Poprzedni',
'PREVIOUS_PAGE' =>  'Poprzednia strona',
'PRIVATE' =>  'Prywatna',
'PRIVATE_VIEWERS' =>  'Prywatni obserwatorzy',
'PROFILES_EDIT' =>  'Zmień profil',
'PUBLIC' =>  'Publiczna',
'PUBL_END_DATE' =>  'Data zakończenia',
'PUBL_START_DATE' =>  'Data rozpoczęcia',
'RADIO_BUTTON_GROUP' =>  'Grupa pól przelączanych',
'READ' =>  'Odczytaj',
'READ_MORE' =>  'Czytaj dalej',
'REDIRECT_AFTER' =>  'Przekierowanie po',
'REGISTERED' =>  'Zarejestrowany',
'REGISTERED_VIEWERS' =>  'Zarejestrowani obserwatorzy',
'REGISTERED_CONTENT'	=> 'Tylko zarejestrowani goście mają dostęp do tej zawartości.',
'RELOAD' =>  'Przeładuj, odswież',
'REMEMBER_ME' =>  'Zapamietaj mnie',
'RENAME' =>  'Zmień nazwe',
'RENAME_FILES_ON_UPLOAD' =>  'Zabronione wgrywanie tego typu plików',
'REQUIRED' =>  'Wymagany',
'REQUIREMENT' =>  'Wymagania',
'RESET' =>  'Resetuj',
'RESIZE' =>  'Zmień rozmiar',
'RESIZE_IMAGE_TO' =>  'Zmień rozmiar obrazków na',
'RESTORE' =>  'Przywróć',
'RESTORE_DATABASE' =>  'Przywróć baze danych',
'RESTORE_MEDIA' =>  'Przywróć media',
'RESULTS' =>  'Wyniki',
'RESULTS_FOOTER' =>  'Stopka wyników',
'RESULTS_FOR' =>  'Wyniki dla',
'RESULTS_HEADER' =>  'Naglówek wyników',
'RESULTS_LOOP' =>  'Pętla wyników',
'RETYPE_NEW_PASSWORD' =>  'Powtórz nowe hasło',
'RETYPE_PASSWORD' =>  'Powtórz hasło',
'SAME_WINDOW' =>  'To samo okno',
'SAVE' =>  'Zapisz',
'SEARCH' =>  'Szukaj',
'SEARCH_FOR'  => 'Szukaj po',
'SEARCHING' =>  'Wyszukiwanie',
'SECTION' =>  'Sekcja',
'SECTION_BLOCKS' =>  'Bloki sekcji',
'SECTION_ID' => 'ID sekcji',
'SEC_ANCHOR' =>  'Przedrostek tabeli (prefix)',
'SELECT_BOX' =>  'Pole wyboru',
'SEND_DETAILS' =>  'Wyślij szczegóły',
'SEPARATE' =>  'Osobno',
'SEPERATOR' =>  'Separator',
'SERVER_EMAIL' =>  'E-mail serwera',
'SERVER_OPERATING_SYSTEM' =>  'System operacyjny serwera',
'SESSION_IDENTIFIER' =>  'Identyfikator sesji',
'SETTINGS' =>  'Ustawienia',
'SHORT' =>  'Krótki',
'SHORT_TEXT' =>  'Krótki tekst',
'SHOW' =>  'Wyświetl',
'SHOW_ADVANCED' =>  'Wyswietl opcje zaawansowane',
'SIGNUP' =>  'Zapisz się',
'SIZE' =>  'Rozmiar',
'SMART_LOGIN' =>  'Inteligentne logowanie',
'START' =>  'Start',
'START_PUBLISHING' =>  'Rozpocznij publikowanie',
'SUBJECT' =>  'Temat',
'SUBMISSIONS' =>  'Zgłoszenia',
'SUBMISSIONS_STORED_IN_DATABASE' =>  'Zgłoszenia przechowywane w bazie danych',
'SUBMISSION_ID' =>  'ID zgłoszenia',
'SUBMITTED' =>  'Zgloszone',
'SUCCESS' =>  'Sukces',
'SYSTEM_DEFAULT' =>  'Domyślne ustawienia systemu',
'SYSTEM_PERMISSIONS' =>  'Uprawnienia systemowe',
'TABLE_PREFIX' =>  'Przedrostek tabeli',
'TARGET' =>  'Cel',
'TARGET_FOLDER' =>  'Folder docelowy',
'TEMPLATE' =>  'Szablon',
'TEMPLATE_PERMISSIONS' =>  'Uprawnienia szablonów',
'TEXT' =>  'Tekst',
'TEXTAREA' =>  'Obszar tekstowy',
'TEXTFIELD' =>  'Pole tekstowe',
'THEME' =>  'Szablon panelu administracji',
'TIME' =>  'Czas',
'TIMEZONE' =>  'Strefa czasowa',
'TIME_FORMAT' =>  'Format czasu',
'TIME_LIMIT' =>  'Maksymalny czas potrzebny na fragment modułu',
'TITLE' =>  'Tytuł',
'TO' =>  'Do',
'TOP_FRAME' =>  'Glówna ramka',
'TRASH_EMPTIED' =>  'Śmietnik opróniony',
'TXT_EDIT_CSS_FILE' =>  'Edycja CSS w polu tekstowym poniżej.',
'TYPE' =>  'Rodzaj',
'UNINSTALL' =>  'Odinstaluj',
'UNKNOWN' =>  'Nieznany',
'UNLIMITED' =>  'Nieograniczony',
'UNZIP_FILE' =>  'Wrzuć i rozpakuj archiwum',
'UP' =>  'Góra',
'UPGRADE' =>  'Aktualizuj',
'UPLOAD_FILES' =>  'Zaladuj plik(i)',
'URL' =>  'URL',
'USER' =>  'Użytkownik',
'USERNAME' =>  'Nazwa logowania',
'USERS_ACTIVE' =>  'Aktywni użytkownicy',
'USERS_CAN_SELFDELETE' =>  'Użytkownik moęe usunąć się sam',
'USERS_CHANGE_SETTINGS' =>  'Użytkownik może zmienić swoje ustawienia',
'USERS_DELETED' =>  'Użytkownicy usunięci',
'USERS_FLAGS' =>  'Flagi użytkowników',
'USERS_PROFILE_ALLOWED' =>  'Użytkownik może tworzyć profil rozszerzony',
'VERIFICATION' =>  'Weryfikacja',
'VERSION' =>  'Wersja',
'VIEW' =>  'Widok',
'VIEW_DELETED_PAGES' =>  'Wyświetl usunięte strony',
'VIEW_DETAILS' =>  'Pokaż szczegóły',
'VISIBILITY' =>  'Widoczność',
'WBMAILER_DEFAULT_SENDER_MAIL' =>  'Domyślny mail nadawcy (FROM)',
'WBMAILER_DEFAULT_SENDER_NAME' =>  'Domyślna nazwa nadawcy (SENDER)',
'WBMAILER_DEFAULT_SETTINGS_NOTICE' =>  'Określ domyślny adres odbiorcy "FROM" i nadawcy "SENDER". Zaleca się stosowanie ODBIORCY tak jak na przykładzie: <strong>admin@yourdomain.com</strong>. Niektórzy dostawcy maili (np. <em>mail.com</em>) moga odrzucic maile od ODBIORCY adresu takiego jak np <em>name@mail.com</em> ze względu na potraktowanie tego jako spam.<br /><br /> Wartości domyślne są używane tylko wtedy inne wartosci są określone przez LEPTON-a. Jeśli twój serwer obsługuje <acronym title="Prosty protokól przesylania poczty">SMTP</acronym>, możesz skorzystac z tej funkcji.',
'WBMAILER_FUNCTION' =>  'Funkcja maila',
'WBMAILER_NOTICE' =>  '<strong>Ustawienia poczty SMTP:</strong><br />Te ustawienia są wymagane jeśli chcesz użyć wysyłania via <acronym title="Simple mail transfer protocol">SMTP</acronym>. Jeśli nie znasz swojego SMTP host albo nie jesteś pewien tych ustawień, to poprostu zostaw tę ustawienia: PHP MAIL.',
'WBMAILER_PHP' =>  'mail PHP',
'WBMAILER_SEND_TESTMAIL' => 'Wysyłanie testowego eMail-a',
'WBMAILER_SMTP' =>  'SMTP',
'WBMAILER_SMTP_AUTH' =>  'Weryfikacja SMTP',
'WBMAILER_SMTP_AUTH_NOTICE' =>  'Aktywuj tylko jeśli serwer wymaga uwierzytelnienia SMTP',
'WBMAILER_SMTP_HOST' =>  ' Host SMTP',
'WBMAILER_SMTP_PASSWORD' =>  'Hasło poczty SMTP',
'WBMAILER_SMTP_USERNAME' =>  'SMTP Loginname',
'WBMAILER_TESTMAIL_FAILED' => 'Testest eMail nie mógł być wysłany! Proszę sprawdzić ustawienia!',
'WBMAILER_TESTMAIL_SUCCESS' => 'Test eMail został wysłany. Proszę sprawdzić swoją skrzynkę pocztową.',
'WBMAILER_TESTMAIL_TEXT' => 'To kest wymagany test eMail: php mailer działa',
'WEBSITE' =>  'Witryna',
'WEBSITE_DESCRIPTION' =>  'Opis witryny',
'WEBSITE_FOOTER' =>  'Stopka witryny',
'WEBSITE_HEADER' =>  'Naglówek witryny',
'WEBSITE_KEYWORDS' =>  'Slowa kluczowe witryny',
'WEBSITE_TITLE' =>  'Tytuł witryny',
'WELCOME_BACK' =>  'Witamy ponownie',
'WIDTH' =>  'Szerokość',
'WINDOW' =>  'Okno',
'WINDOWS' =>  'Windows',
'WORLD_WRITEABLE_FILE_PERMISSIONS' =>  'Uprawnienia zapisywania plików przez wszystkich',
'WRITE' =>  'Zapisz',
'WYSIWYG_EDITOR' =>  'Edytor WYSIWYG',
'WYSIWYG_STYLE' =>  'Styl WYSIWYG',
'YES' =>  'Tak',
	'BASICS'	=> array(
		'day'		=> "dzień",		# day, singular
		'day_pl'	=> "dni",		# day, plural
		'hour'		=> "godzina", 		# hour, singular
		'hour_pl'	=> "godziny",		# hour, plural
		'minute'	=> "minuta",	# minute, singular
		'minute_pl'	=> "minuty",	# minute, plural
	)
); // $TEXT

$HEADING = array(
'ADDON_PRECHECK_FAILED' =>  'Wymagania dodatku nie zostaly spełnione',
'ADD_CHILD_PAGE' =>  'Dodaj stronę dziecko"',
'ADD_GROUP' =>  'Dodaj grupę',
'ADD_GROUPS' =>  'Dodaj grupy',
'ADD_HEADING' =>  'Dodaj naglówek',
'ADD_PAGE' =>  'Dodaj stronę',
'ADD_USER' =>  'Dodaj użytkownika',
'ADMINISTRATION_TOOLS' =>  'Narzędzia administracyjne',
'BROWSE_MEDIA' =>  'Przeglądaj media',
'CREATE_FOLDER' =>  'Utwórz folder',
'DEFAULT_SETTINGS' =>  'Ustawienia domyslne',
'DELETED_PAGES' =>  'Usunięte strony',
'FILESYSTEM_SETTINGS' =>  'Ustawienia systemu plików',
'GENERAL_SETTINGS' =>  'Ustawienia ogólne',
'INSTALL_LANGUAGE' =>  'Zainstaluj język',
'INSTALL_MODULE' =>  'Zainstaluj moduł',
'INSTALL_TEMPLATE' =>  'Zainstaluj szablon',
'INVOKE_MODULE_FILES' =>  'Uaktywnij pliki modułów ręcznie',
'LANGUAGE_DETAILS' =>  'Szczegóły języka',
'MANAGE_SECTIONS' =>  'Zarządzaj sekcjami',
'MODIFY_ADVANCED_PAGE_SETTINGS' =>  'Zmień zaawansowane ustawienia strony',
'MODIFY_DELETE_GROUP' =>  'Zmień/usuń grupe',
'MODIFY_DELETE_PAGE' =>  'Zmień/Usuń stronę',
'MODIFY_DELETE_USER' =>  'Zmień/usuń użytkownika',
'MODIFY_GROUP' =>  'Zmień grupe',
'MODIFY_GROUPS' =>  'Zmień grupy',
'MODIFY_INTRO_PAGE' =>  'Zmień stronę poczatkową',
'MODIFY_PAGE' =>  'Zmień stronę',
'MODIFY_PAGE_SETTINGS' =>  'Zmień ustawienia strony',
'MODIFY_USER' =>  'Zmień użytkownika',
'MODULE_DETAILS' =>  'Szczegóły modułu',
'MY_EMAIL' =>  'Mój e-mail',
'MY_PASSWORD' =>  'Moje hasło',
'MY_SETTINGS' =>  'Moje ustawienia',
'SEARCH_SETTINGS' =>  'Ustawienia wyszukiwania',
'SEARCH_PAGE' 			=> 'Search Page',
'SECURITY_SETTINGS'		=> 'Ustawienia bezpieczeństwa',
'SERVER_SETTINGS' =>  'Ustawienia serwera',
'TEMPLATE_DETAILS' =>  'Szczegóły szablonu',
'UNINSTALL_LANGUAGE' =>  'Odinstaluj język',
'UNINSTALL_MODULE' =>  'Odinstaluj moduł',
'UNINSTALL_TEMPLATE' =>  'Odinstaluj szablon',
'UPGRADE_LANGUAGE' =>  'Język rejestracja/modernizacja',
'UPLOAD_FILES' =>  'Zaladuj plik(i)',
'VISIBILITY' 			=> 'Widoczność',
'WBMAILER_SETTINGS' =>  'Ustawienia rozsyłania maili'
); // $HEADING

$MESSAGE = array(
'ADDON_ERROR_RELOAD' =>  'Błąd podczas aktualizacji dodatku.',
'ADDON_GROUPS_MARKALL' => 'Zaznacz / odznacz wszystko',
'ADDON_LANGUAGES_RELOADED' =>  'Pomyślnie zainstalowano ponownie pliki językowe',
'ADDON_MANUAL_FTP_LANGUAGE' =>  '<strong>UWAGA!</strong> Ze względów bezpieczenstwa przesłanie plików językowych do folderu /languages/ powinno odbyc się tylko przez FTP.',
'ADDON_MANUAL_FTP_WARNING' =>  'Uwaga istniejące wpisy modułu moga zostać utracone w bazie danych.',
'ADDON_MANUAL_INSTALLATION' =>  'Jeśli moduły sa przesylane za pomoca protokolu FTP (nie polecane), to funkcje takie jak <tt>instalacja</tt>, <tt>aktualizacja</tt> lub <tt>odinstalowanie</tt> mogą nie dzialać prawidłowo. <br /><br />',
'ADDON_MANUAL_INSTALLATION_WARNING' =>  'Uwaga istniejące wpisy modułu mogą zostać utracone w bazie danych. Użyj tej opcji tylko wtedy gdy masz problemy z przesłaniem przez FTP.',
'ADDON_MANUAL_RELOAD_WARNING' =>  'Uwaga istniejace wpisy modułu moga zostac utracone w bazie danych.',
'ADDON_MODULES_RELOADED' =>  'Pomyślnie zainstalowano ponownie moduły',
'ADDON_PRECHECK_FAILED' =>  'Instalacja dodatku. Twój system nie spełnia wymogów niniejszego dodatku. Aby system pracował z tym dodatkiem należy rozwiazać kwestie przedstawione poniżej.',
'ADDON_RELOAD' =>  'Aktualizacja bazy danych z informacjami dodatków (np. po FTP).',
'ADDON_TEMPLATES_RELOADED' =>  'Szablony zostaly pomyślnie załadowane ponownie',
'ADMIN_INSUFFICIENT_PRIVELLIGES' =>  'Niewystarczające uprawnienia do ogladania tej strony.',
'FORGOT_PASS_ALREADY_RESET' =>  'Hasło można resetowac tylko raz na godzine',
'FORGOT_PASS_CANNOT_EMAIL' =>  'Nie udało się wysłać hasła, proszę się skontaktować z administratorem',
'FORGOT_PASS_EMAIL_NOT_FOUND' =>  'Wprowadzonego adresu e-mail nie ma w bazie danych',
'FORGOT_PASS_NO_DATA' =>  'Proszę wprowadzic poniżej swój adres e-mail',
'FORGOT_PASS_PASSWORD_RESET' =>  'Twój login i hasło zostało wysłane na twój adres eMail.',
'FRONTEND_SORRY_NO_ACTIVE_SECTIONS' =>  'Niestety, nie ma aktywnej zawartości do wyświetlenia',
'FRONTEND_SORRY_NO_VIEWING_PERMISSIONS' =>  'Niestety, nie masz uprawnien do ogladania tej strony.',
'GENERIC_ALREADY_INSTALLED' =>  'już zainstalowany',
'GENERIC_BAD_PERMISSIONS' =>  'Nie można zapisać do katalogu docelowego',
'GENERIC_CANNOT_UNINSTALL' =>  'Nie można odinstalować',
'GENERIC_CANNOT_UNINSTALL_IN_USE' =>  'Nie można odinstalować: wybrany plik jest obecnie używany',
'GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL' =>  '<br /><br />{{type}} <b>{{type_name}}</b> nie może być odinstalowany, ponieważ jest używany przez {{pages}}:<br /><br />',
'GENERIC_CANNOT_UNINSTALL_IN_USE_TMPL_PAGES' =>  'nastepującą stronę, następujące strony',
'GENERIC_CANNOT_UNINSTALL_IS_DEFAULT_TEMPLATE' =>  'Szablon <b>{{name}}</b> nie może być odinstalowany, ponieważ jest ustawiony jako szablon domyślny!',
'GENERIC_CANNOT_UNZIP' =>  'Nie można rozpakowac pliku',
'GENERIC_CANNOT_UPLOAD' =>  'Nie można zaladowac pliku',
'GENERIC_COMPARE' =>  ' pomyślnie',
'GENERIC_ERROR_OPENING_FILE' =>  'Bląd podczas otwierania pliku.',
'GENERIC_FAILED_COMPARE' =>  ' niepomyślnie',
'GENERIC_FILE_TYPE' =>  'Proszę zwrócic uwagę, ze ładowany plik musi byc w formacie:',
'GENERIC_FILE_TYPES' =>  'Proszę zwrócic uwagę, ze ładowany plik musi byc w jednym z formatów:',
'GENERIC_FILL_IN_ALL' =>  'Proszę się cofnąć i wypełnić wszystkie pola',
'GENERIC_INSTALLED' =>  'Zainstalowano pomyślnie',
'GENERIC_INVALID' =>  'Załadowany plik jest nieprawidłowy',
'GENERIC_INVALID_ADDON_FILE' =>  'Nieprawidłowy plik instalacyjny LEPTON-a. Sprawdz format *.zip.',
'GENERIC_INVALID_LANGUAGE_FILE' =>  'Nieprawidłowy plik językowy LEPTON-a. Proszę sprawdzic w pliku tekstowym.',
'GENERIC_IN_USE' =>  ' może byc użyte w ',
'GENERIC_MODULE_VERSION_ERROR' =>  'moduł nie jest poprawnie zainstalowany! Blędna wersja!',
'GENERIC_NOT_COMPARE' =>  'nie jest możliwe',
'GENERIC_NOT_INSTALLED' =>  'Niezainstalowano',
'GENERIC_NOT_UPGRADED' =>  'Aktualizacja nie może nastąpić',
'GENERIC_PLEASE_BE_PATIENT' =>  'Prosimy o cierpliwosc, to może troche potrwac.',
'GENERIC_PLEASE_CHECK_BACK_SOON' =>  'Zapraszamy wkrótce...',
'GENERIC_SECURITY_ACCESS' =>  'Naruszenie bezpieczenstwa!! Odmowa dostępu!',
'GENERIC_SECURITY_OFFENSE' =>  'Naruszenia bezpieczenstwa! Przechowywanie danych zostało odrzucone!',
'GENERIC_UNINSTALLED' =>  'Odinstalowano pomyślnie',
'GENERIC_UPGRADED' =>  'Zaktualizowano pomyślnie',
'GENERIC_VERSION_COMPARE' =>  'Porównanie wersji',
'GENERIC_VERSION_GT' =>  'Wymagana aktualizacja!',
'GENERIC_VERSION_LT' =>  'Aktualizacja do niższej wersji',
'GENERIC_WEBSITE_UNDER_CONSTRUCTION' =>  'Witryna w trakcie tworzenia',
'GROUPS_ADDED' =>  'Grupa została dodana',
'GROUPS_CONFIRM_DELETE' =>  'Czy aby na pewno usunąć wybraną grupe (i wszystkich użytkowników, którzy do niej należa)?',
'GROUPS_DELETED' =>  'Grupa została usunięta',
'GROUPS_GROUP_NAME_BLANK' =>  'Nazwa grupy jest pusta',
'GROUPS_GROUP_NAME_EXISTS' =>  'Grupa o takiej nazwie już istnieje',
'GROUPS_NO_GROUPS_FOUND' =>  'Nie odnaleziono żadnych grup',
'GROUPS_SAVED' =>  'Grupa została zapisana',
'LANG_MISSING_PARTS_NOTICE' => 'Błąd instalacji języka, jednej lub więcej zmiennych brakuje:<br />language_code<br />language_name<br />language_version<br />language_license',
'LOGIN_AUTHENTICATION_FAILED' =>  'Błędny Login lub Hasło',
'LOGIN_BOTH_BLANK' =>  'Proszę wpisać swój login i hasło',
'LOGIN_PASSWORD_BLANK' =>  'Proszę wprowadzic hasło',
'LOGIN_PASSWORD_TOO_LONG' =>  'Wprowadzone hasło jest zbyt krótkie',
'LOGIN_PASSWORD_TOO_SHORT' =>  'Wprowadzone hasło jest zbyt krótkie',
'LOGIN_USERNAME_BLANK' =>  'Proszę wprowadzić login',
'LOGIN_USERNAME_TOO_LONG' =>  'Nazwa loginu jest zbyt długa',
'LOGIN_USERNAME_TOO_SHORT' =>  'Nazwa loginu jest zbyt krótka',
'MEDIA_BLANK_EXTENSION' =>  'Nie wprowadzono rozszerzenia pliku',
'MEDIA_BLANK_NAME' =>  'Nie wprowadzono nazwy użytkownika',
'MEDIA_CANNOT_DELETE_DIR' =>  'Nie można usunąć wybranego folderu',
'MEDIA_CANNOT_DELETE_FILE' =>  'Nie można usunąć wybranego pliku',
'MEDIA_CANNOT_RENAME' =>  'Nie udało się zmienić nazwy',
'MEDIA_CONFIRM_DELETE' =>  'Czy aby na pewno usunąć następujące pliki lub foldery?',
'MEDIA_CONFIRM_DELETE_FILE'	=> 'Jesteś pewny/a usunięcia tego pliku {name}?',
'MEDIA_CONFIRM_DELETE_DIR'	=> 'Jesteś pewny/a usunięcia tego folderu {name}?',
'MEDIA_DELETED_DIR' =>  'Folder został usunięty',
'MEDIA_DELETED_FILE' =>  'Plik został usunięty',
'MEDIA_DIR_ACCESS_DENIED' =>  'Określony folder nie istnieje lub nie jest dozwolony.',
'MEDIA_DIR_DOES_NOT_EXIST' =>  'Folder nie istnieje',
'MEDIA_DIR_DOT_DOT_SLASH' =>  'Nazwa folderu nie może zawierać ../',
'MEDIA_DIR_EXISTS' =>  'Folder pasujący do wprowadzonej nazwy już istnieje',
'MEDIA_DIR_MADE' =>  'Folder został utworzony',
'MEDIA_DIR_NOT_MADE' =>  'Nie udało się utworzyc folderu',
'MEDIA_FILE_EXISTS' =>  'Plik pasujący do wprowadzonej nazwy już istnieje',
'MEDIA_FILE_NOT_FOUND' =>  'Plik nieodnaleziony',
'MEDIA_NAME_DOT_DOT_SLASH' =>  'Nazwa nie może zawierać ../',
'MEDIA_NAME_INDEX_PHP' =>  'Nie można uzyc index.php jako nazwy',
'MEDIA_NONE_FOUND' =>  'Nie odnaleziono żadnych mediów w biezacym folderze',
'MEDIA_NO_FILE_UPLOADED' =>  'Nie przyjęto pliku',
'MEDIA_RENAMED' =>  'Nazwa została zmieniona',
'MEDIA_SINGLE_UPLOADED' =>  ' plik został pomyślnie załadowany',
'MEDIA_TARGET_DOT_DOT_SLASH' =>  'Folder docelowy nie może zawierać ../',
'MEDIA_UPLOADED' =>  ' pliki zostaly pomyślnie zaladowane',
'MOD_FORM_EXCESS_SUBMISSIONS' =>  'Niestety, ten formularz został wysłany zbyt wiele razy w ciagu tej godziny. Prosimy spróbowac ponownie za godzine.',
'MOD_FORM_INCORRECT_CAPTCHA' =>  'Wprowadzony numer weryfikacyjny (tzw. Captcha) jest nieprawidłowy. Jeśli masz problemy z odczytaniem Captcha, napisz do: <a href="mailto:'.SERVER_EMAIL.'">'.SERVER_EMAIL.'</a>',
'MOD_FORM_REQUIRED_FIELDS' =>  'Nalezy wprowadzic szczegóły dla nastepujacych pól',
'PAGES_ADDED' =>  'Strona została dodana',
'PAGES_ADDED_HEADING' =>  'Naglówek strony został dodany',
'PAGES_BLANK_MENU_TITLE' =>  'Proszę wprowadzic tytuł menu',
'PAGES_BLANK_PAGE_TITLE' =>  'Proszę wprowadzic tytuł strony',
'PAGES_CANNOT_CREATE_ACCESS_FILE' =>  'Błąd podczas tworzenia pliku dostepowego w katalogu /pages (niewystarczajace uprawnienia)',
'PAGES_CANNOT_DELETE_ACCESS_FILE' =>  'Błąd podczas usuwania pliku dostepowego w katalogu /pages (niewystarczajace uprawnienia)',
'PAGES_CANNOT_REORDER' =>  'Błąd podczas zmieniania kolejnosci stron',
'PAGES_DELETED' =>  'Strona została usunięta',
'PAGES_DELETE_CONFIRM' 	=> 'Czy aby na pewno usunac wybrana strone &laquo;%s&raquo; (i wszystkie jej podstrony)',
'PAGES_INSUFFICIENT_PERMISSIONS' =>  'Nie masz uprawnien do modyfikowania tej strony',
'PAGES_INTRO_EMPTY' 		=> 'Proszę wprowadzić zawartość, pusta intro page nie możesz zapisać.',
'PAGES_INTRO_LINK' =>  'Kliknij TUTAJ by zmienić stronę wprowadzającą',
'PAGES_INTRO_NOT_WRITABLE' =>  'Nie można zapisać pliku page-directory/intro.php (niewystarczajace uprawnienia)',
'PAGES_INTRO_SAVED' =>  'Strona wprowadzająca została zapisana',
'PAGES_LAST_MODIFIED' =>  'Ostatnio zmodyfikowane przez',
'PAGES_NOT_FOUND' =>  'Strona nie znaleziona',
'PAGES_NOT_SAVED' =>  'Błąd podczas zapisywania strony',
'PAGES_PAGE_EXISTS' =>  'Strona o tym lub podobnym tytule już istnieje',
'PAGES_REORDERED' =>  'Zmieniono kolejnosc stron',
'PAGES_RESTORED' =>  'Strona została przywrócona',
'PAGES_RETURN_TO_PAGES' =>  'Powrót do stron',
'PAGES_SAVED' =>  'Strona została zapisana',
'PAGES_SAVED_SETTINGS' =>  'Ustawienia strony zostaly zapisane',
'PAGES_SECTIONS_PROPERTIES_SAVED' =>  'Wlasciwosci sekcji zostaly zapisane',
'PREFERENCES_CURRENT_PASSWORD_INCORRECT' =>  '(Biezace) hasło jest nieprawidlowe',
'PREFERENCES_DETAILS_SAVED' =>  'Szczegóły zostaly zapisane',
'PREFERENCES_EMAIL_UPDATED' =>  'E-mail został zaktualizowany',
'PREFERENCES_INVALID_CHARS' =>  'Błąd. hasło zawiera nieprawidlowe znaki',
'PREFERENCES_PASSWORD_CHANGED' =>  'hasło zostało zmienione',
'PREFERENCES_PASSWORD_MATCH' => 'Passwords do not match',
'RECORD_MODIFIED_FAILED' =>  'Zmiana tego rekordu nie powiodla się',
'RECORD_MODIFIED_SAVED' =>  'Zmiana rekordu został zaktualizowana pomyślnie.',
'RECORD_NEW_FAILED' =>  'Dodanie nowego rekordu się nie powiodlo.',
'RECORD_NEW_SAVED' =>  'Nowy rekord został dodany pomyślnie.',
'SETTINGS_MODE_SWITCH_WARNING' =>  'Uwaga: naciśnięcie tego przycisku resetuje wszystkie niezapisane zmiany',
'SETTINGS_SAVED' =>  'Ustawienia zostaly zapisane',
'SETTINGS_UNABLE_OPEN_CONFIG' =>  'Nie można otworzyc pliku konfiguracyjnego',
'SETTINGS_UNABLE_WRITE_CONFIG' =>  'Nie można zapisać pliku konfiguracyjnego',
'SETTINGS_WORLD_WRITEABLE_WARNING' =>  'Uwaga: zalecane wylacznie w srodowiskach testowych',
'SIGNUP2_ADMIN_INFO' =>  '
Nowe konto użytkownika zostało utworzone.

Loginname: {LOGIN_NAME}
ID użytkownika: {LOGIN_ID}
E-Mail: {LOGIN_EMAIL}
Adres IP: {LOGIN_IP}
Data rejestracji: {SIGNUP_DATE}
----------------------------------------
Ta wiadomość została wygenerowana automatycznie.

',
'SIGNUP2_BODY_LOGIN_FORGOT' =>  '
Witaj {LOGIN_DISPLAY_NAME},

Ten mail został wysłany ponieważ\'zapomiano hasła\' funkcja odzyskania twojego konta została uruchomiona.

Szczegóły twojego nowego konta \'{LOGIN_WEBSITE_TITLE}\' poniżej:

Loginname: {LOGIN_NAME}
hasło: {LOGIN_PASSWORD}

Powyżej zostało podane twoje hasło.
Oznacza to, ze stare hasło nie będzie już działać!
Jeśli masz pytania badz problemy z nowym loginem lub hasłem skontaktuj
się z administratorem \'{LOGIN_WEBSITE_TITLE}\'.
Aby uniknąć nieoczekiwanych awarii proszę pamiętać o czyszczeniu pamięci podręcznej cache przeglądarki

Pozdrawiamy
------------------------------------
Ta wiadomość została wygenerowana automatycznie.

',
'SIGNUP2_BODY_LOGIN_INFO' =>  '
Hello {LOGIN_DISPLAY_NAME},

Witamy \'{LOGIN_WEBSITE_TITLE}\'.

Szczegóły konta \'{LOGIN_WEBSITE_TITLE}\' poniżej:
Loginname: {LOGIN_NAME}
hasło: {LOGIN_PASSWORD}

Pozdrawiamy

Prosba:
Jeśli otrzymałeś (aś) tę wiadomość przez pomyłkę, usuń ja niezwłocznie!
-------------------------------------
Ta wiadomość została wygenerowana automatycznie!
',
'SIGNUP2_SUBJECT_LOGIN_INFO' =>  'Twoje dane logowania...',
'SIGNUP_NO_EMAIL' =>  'Nalezy wprowadzic adres e-mail',
'START_CURRENT_USER' =>  'Jestes obecnie zalogowany(-a) jako:',
'START_INSTALL_DIR_EXISTS' =>  'Uwaga: folder instalacyjny wciąż istnieje!',
'START_WELCOME_MESSAGE' =>  'Witamy w panelu administracyjnym CMS',
'STATUSFLAG_32'			=> 'Cannot delete User, User got statusflags 32 in table users.',
'SYSTEM_FUNCTION_DEPRECATED'=> 'Ta funkcja <b>%s</b> jest przestarzała, użyj funkcji <b>%s</b>!',
'SYSTEM_FUNCTION_NO_LONGER_SUPPORTED' => 'Ta funkcja <b>%s</b> jest przestarzała i nie będzie wspierana!',
'SYSTEM_SETTING_NO_LONGER_SUPPORTED' => 'Te ustawienia<b>%s</b> nie są wspierane i będą ignorowane!',
'TEMPLATES_CHANGE_TEMPLATE_NOTICE' =>  'Uwaga: aby zmienić szablon, należy przejść do sekcji Ustawienia',
'TEMPLATES_MISSING_PARTS_NOTICE' => 'Instalacja szablunu się nie powiodła, brakuje jednej lub więcej zmiennych:<br />template_directory<br />template_name<br />template_version<br />template_author<br />template_license<br />template_function ("theme" oder "template")',
'USERS_ADDED' =>  'użytkownik został dodany',
'USERS_CANT_SELFDELETE' =>  'Zadanie odrzucone, Nie możesz usunąć sam siebie!',
'USERS_CHANGING_PASSWORD' =>  'Uwaga: Powyższe pola należy wypełnić tylko, jeśli chce się zmienić hasło tego użytkownika',
'USERS_CONFIRM_DELETE' =>  'Czy aby na pewno usunąć wybranego użytkownika?',
'USERS_DELETED' =>  'użytkownik został usunięty',
'USERS_EMAIL_TAKEN' =>  'Wprowadzony adres e-mail jest już używany',
'USERS_INVALID_EMAIL' =>  'Wprowadzony adres e-mail jest nieprawidłowy',
'USERS_NAME_INVALID_CHARS' =>  'Znaleziono błędny znak w nazwie loginu',
'USERS_NO_GROUP' =>  'Nie wybrano grupy',
'USERS_PASSWORD_MISMATCH' =>  'Wprowadzone hasła nie pasują',
'USERS_PASSWORD_TOO_SHORT' =>  'Wprowadzone hasło bylo za krótkie',
'USERS_SAVED' =>  'użytkownik został zapisany',
'USERS_USERNAME_TAKEN' =>  'Taki login jest już już używany',
'USERS_USERNAME_TOO_SHORT' =>  'Nazwa loginu jest zbyt krótka'
); // $MESSAGE

$OVERVIEW = array(
'ADMINTOOLS' =>  'Narzędzia administracji',
'GROUPS' =>  'Zarządzaj grupami użytkowników i ich uprawnieniami systemowymi...',
'HELP' =>  'Masz pytania? Znajdz odpowiedzi...',
'LANGUAGES' =>  'Zarządzaj jezykami',
'MEDIA' =>  'Zarządzaj plikami przechowywanymi w folderze mediów...',
'MODULES' =>  'Zarządzaj modułami',
'PAGES' =>  'Zarządzaj stronami...',
'PREFERENCES' =>  'Zmień preferencje, takie jak adres e-mail, hasło itp... ',
'SETTINGS' =>  'Zmień ustawienia',
'START' =>  'Panel administracyjny',
'TEMPLATES' =>  'Zmień wygląd swojej strony za pomoca szablonów...',
'USERS' =>  'Zarządzaj użytkownikami mogacymi logować się',
'VIEW' =>  'Podgląd witryny w nowym oknie...'
);

/*
 * Create the old languages definitions only if specified in settings
 */
if (ENABLE_OLD_LANGUAGE_DEFINITIONS) {
	foreach ($MESSAGE as $key => $value) {
		$x = strpos($key, '_');
		$MESSAGE[substr($key, 0, $x)][substr($key, $x+1)] = $value;
	}
}
?>