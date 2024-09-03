export const REQUIRED_ERROR_MESSAGE = 'Vous devez remplir ce champ';
export const ACCEPTED_ERROR_MESSAGE = 'Vous devez accepter ce champ';
export const ACTIVE_URL_ERROR_MESSAGE = "Ce champ n'est pas une URL valide";
export const AFTER_DATE_ERROR_MESSAGE = (date : string) =>
  `La date doit être après le ${date}`;
export const AFTER_OR_EQUAL_DATE_ERROR_MESSAGE = (date : string) =>
  `La date doit être égale ou après le ${date}`;
export const ALPHA_ERROR_MESSAGE = 'Ce champ ne peut contenir que des lettres';
export const ALPHA_DASH_ERROR_MESSAGE =
  'Ce champ ne peut contenir que des lettres, des chiffres et des tirets';
export const ALPHA_NUM_ERROR_MESSAGE =
  'Ce champ ne peut contenir que des lettres et des chiffres';
export const ARRAY_ERROR_MESSAGE = 'Ce champ doit être un tableau';
export const BEFORE_DATE_ERROR_MESSAGE = (date : string) =>
  `La date doit être avant le ${date}`;
export const BEFORE_OR_EQUAL_DATE_ERROR_MESSAGE = (date : string) =>
  `La date doit être égale ou avant le ${date}`;
export const BETWEEN_NUMERIC_ERROR_MESSAGE = (min : string, max : string) =>
  `La valeur doit être entre ${min} et ${max}`;
export const BETWEEN_STRING_ERROR_MESSAGE = (min : string, max : string) =>
  `Le texte doit contenir entre ${min} et ${max} caractères`;
export const BOOLEAN_ERROR_MESSAGE = 'Ce champ doit être vrai ou faux';
export const CONFIRMED_ERROR_MESSAGE = 'La confirmation ne correspond pas';
export const DATE_ERROR_MESSAGE = 'Ce champ doit contenir une date valide';
export const DATE_IN_FUTUR_ERROR_MESSAGE =
  'La date ne peut pas être supérieur à la date du jour';
export const DATE_EQUALS_ERROR_MESSAGE = (date : string) =>
  `La date doit être égale à ${date}`;
export const DATE_FORMAT_ERROR_MESSAGE = (format : string) =>
  `La date doit correspondre au format ${format}`;
export const DIFFERENT_ERROR_MESSAGE = 'Ce champ doit être différent';
export const DIGITS_ERROR_MESSAGE = (digits : string) =>
  `Ce champ doit contenir ${digits} chiffres`;
export const DIGITS_BETWEEN_ERROR_MESSAGE = (min : string , max : string) =>
  `Ce champ doit contenir entre ${min} et ${max} chiffres`;
export const DIMENSIONS_ERROR_MESSAGE =
  "Les dimensions de l'image ne sont pas valides";
export const DISTINCT_ERROR_MESSAGE = 'Ce champ a une valeur en double';
export const EMAIL_ERROR_MESSAGE =
  'Ce champ doit contenir une adresse email valide';
export const ENDS_WITH_ERROR_MESSAGE = (values : any) =>
  `Ce champ doit se terminer par l'un des éléments suivants : ${values.join(', ')}`;
export const EXISTS_ERROR_MESSAGE = "La valeur sélectionnée n'est pas valide";
export const FILE_ERROR_MESSAGE = 'Ce champ doit contenir un fichier';
export const FILLED_ERROR_MESSAGE = 'Ce champ doit contenir une valeur';
export const GT_NUMERIC_ERROR_MESSAGE = (value : string) =>
  `La valeur doit être supérieure à ${value}`;
export const GT_STRING_ERROR_MESSAGE = (value : string) =>
  `Le texte doit contenir plus de ${value} caractères`;
export const GTE_NUMERIC_ERROR_MESSAGE = (value : string) =>
  `La valeur doit être supérieure ou égale à ${value}`;
export const GTE_STRING_ERROR_MESSAGE = (value : string) =>
  `Le texte doit contenir au moins ${value} caractères`;
export const IMAGE_ERROR_MESSAGE = 'Ce champ doit être une image';
export const IN_ERROR_MESSAGE = "La valeur sélectionnée n'est pas valide";
export const IN_ARRAY_ERROR_MESSAGE =
  "La valeur sélectionnée n'existe pas dans l'ensemble";
export const INTEGER_ERROR_MESSAGE = 'Ce champ doit être un entier';
export const IP_ERROR_MESSAGE = 'Ce champ doit être une adresse IP valide';
export const IPV4_ERROR_MESSAGE = 'Ce champ doit être une adresse IPv4 valide';
export const IPV6_ERROR_MESSAGE = 'Ce champ doit être une adresse IPv6 valide';
export const JSON_ERROR_MESSAGE = 'Ce champ doit être une chaîne JSON valide';
export const LT_NUMERIC_ERROR_MESSAGE = (value : string) =>
  `La valeur doit être inférieure à ${value}`;
export const LT_STRING_ERROR_MESSAGE = (value : string) =>
  `Le texte doit contenir moins de ${value} caractères`;
export const LTE_NUMERIC_ERROR_MESSAGE = (value : string) =>
  `La valeur doit être inférieure ou égale à ${value}`;
export const LTE_STRING_ERROR_MESSAGE = (value : string) =>
  `Le texte doit contenir au maximum ${value} caractères`;
export const MAX_NUMERIC_ERROR_MESSAGE = (max : string) =>
  `La valeur ne peut pas être supérieure à ${max}`;
export const MAX_STRING_ERROR_MESSAGE = (max : string) =>
  `Le texte ne peut pas contenir plus de ${max} caractères`;
export const MIMES_ERROR_MESSAGE = (types : any) =>
  `Le fichier doit être de type : ${types.join(', ')}`;
export const MIME_TYPES_ERROR_MESSAGE = (types : any) =>
  `Le fichier doit être de type : ${types.join(', ')}`;
export const MIN_NUMERIC_ERROR_MESSAGE = (min : string) =>
  `La valeur doit être au moins ${min}`;
export const MIN_STRING_ERROR_MESSAGE = (min : string) =>
  `Le texte doit contenir au moins ${min} caractères`;
export const NOT_IN_ERROR_MESSAGE = "La valeur sélectionnée n'est pas valide";
export const NOT_REGEX_ERROR_MESSAGE = "Le format du champ n'est pas valide";
export const NUMERIC_ERROR_MESSAGE = 'Ce champ doit être un nombre';
export const PRESENT_ERROR_MESSAGE = 'Ce champ doit être présent';
export const REGEX_ERROR_MESSAGE = "Le format du champ n'est pas valide";
export const REQUIRED_IF_ERROR_MESSAGE = 'Ce champ est obligatoire';
export const REQUIRED_UNLESS_ERROR_MESSAGE =
  'Ce champ est obligatoire sauf si une certaine condition est remplie';
export const REQUIRED_WITH_ERROR_MESSAGE =
  'Ce champ est obligatoire lorsque certaines valeurs sont présentes';
export const REQUIRED_WITH_ALL_ERROR_MESSAGE =
  'Ce champ est obligatoire lorsque toutes les valeurs sont présentes';
export const REQUIRED_WITHOUT_ERROR_MESSAGE =
  'Ce champ est obligatoire lorsque certaines valeurs ne sont pas présentes';
export const REQUIRED_WITHOUT_ALL_ERROR_MESSAGE =
  "Ce champ est obligatoire lorsque aucune des valeurs n'est présente";
export const SAME_ERROR_MESSAGE =
  'Ce champ doit correspondre à une certaine valeur';
export const SIZE_NUMERIC_ERROR_MESSAGE = (size : string) =>
  `La valeur doit être ${size}`;
export const SIZE_STRING_ERROR_MESSAGE = (size : string) =>
  `Le texte doit contenir ${size} caractères`;
export const STARTS_WITH_ERROR_MESSAGE = (values : any) =>
  `Ce champ doit commencer par l'un des éléments suivants : ${values.join(', ')}`;
export const STRING_ERROR_MESSAGE =
  'Ce champ doit être une chaîne de caractères';
export const TIMEZONE_ERROR_MESSAGE =
  'Ce champ doit être un fuseau horaire valide';
export const UNIQUE_ERROR_MESSAGE = 'Cette valeur a déjà été prise';
export const URL_ERROR_MESSAGE = 'Ce champ doit contenir une URL valide';
export const UUID_ERROR_MESSAGE = 'Ce champ doit être un UUID valide';
