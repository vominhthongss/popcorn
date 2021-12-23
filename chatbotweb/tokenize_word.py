from underthesea import word_tokenize
from underthesea import classify
import re
import traceback
def normalize_text(text):

        #Loại bỏ các ký tự kéo dài: vd: hayyyyyyy
        #text = re.sub(r'([A-Z])\1+', lambda m: m.group(1).upper(), text, flags=re.IGNORECASE)

        # Chuyển các chữ hoa thành chữ thường
        text = text.lower()

        #Chuẩn hóa tiếng Việt, tiếng Anh, xử lý emoj
        replace_list = {
            'òa': 'oà', 'óa': 'oá', 'ỏa': 'oả', 'õa': 'oã', 'ọa': 'oạ', 'òe': 'oè', 'óe': 'oé','ỏe': 'oẻ',
            'õe': 'oẽ', 'ọe': 'oẹ', 'ùy': 'uỳ', 'úy': 'uý', 'ủy': 'uỷ', 'ũy': 'uỹ','ụy': 'uỵ', 'uả': 'ủa',
            'ả': 'ả', 'ố': 'ố', 'u´': 'ố','ỗ': 'ỗ', 'ồ': 'ồ', 'ổ': 'ổ', 'ấ': 'ấ', 'ẫ': 'ẫ', 'ẩ': 'ẩ',
            'ầ': 'ầ', 'ỏ': 'ỏ', 'ề': 'ề','ễ': 'ễ', 'ắ': 'ắ', 'ủ': 'ủ', 'ế': 'ế', 'ở': 'ở', 'ỉ': 'ỉ',
            'ẻ': 'ẻ', 'àk': u' à ','aˋ': 'à', 'iˋ': 'ì', 'ă´': 'ắ','ử': 'ử', 'e˜': 'ẽ', 'y˜': 'ỹ', 'a´': 'á',
            ':))': '  positive ', ':)': ' positive ',' vl ': ' negative ',
            'kg ': u' không ','not': u' không ', u' kg ': u' không ',' kh ':u' không ','kô':u' không ','ko':u' không ','hok':u' không ',
            ' kp ': u' không phải ',u' kô ': u' không ', '"ko ': u' không ', u' ko ': u' không ', u' k ': u' không ', 'khong': u' không ', u' hok ': u' không ',
            'he he': ' positive ','hehe': ' positive ','hihi': ' positive ', 'haha': ' positive ', 'hjhj': ' positive ',
            ' lol ': ' negative ',' cc ': ' negative ','cute': u' dễ thương ','huhu': ' negative ', ' vs ': u' với ', 'wa': ' quá ', 'wá': u' quá', 'j': u' gì ', '“': ' ',
            ' sz ': u' cỡ ', 'size': u' cỡ ', u' đx ': u' được ', 'dk': u' được ', 'dc': u' được ', 'đk': u' được ',
            'đc': u' được ', 'gud': u' tốt ','god': u' tốt ','wel done':' tốt ', 'good': u' tốt ', 'gút': u' tốt ',
            'sấu': u' xấu ','gut': u' tốt ', u' tot ': u' tốt ', u' nice ': u' tốt ', 'perfect': 'rất tốt', 'bt': u' bình thường ',
            'time': u' thời gian ', 'qá': u' quá ', u' m ': u' mình ', u' mik ': u' mình ',
            'ể': 'ể', 'excellent': 'xuất sắc', 'quality': 'chất lượng','chat':' chất ', 'excelent': 'hoàn hảo', 'bad': 'tệ','sad': ' tệ ',
            'shit': u' dở ẹt ',u' zị ': u' vậy ','beautiful': u' đẹp tuyệt vời ',u'bjo':u' bao giờ ',
            'thik': u' thích ',' fb ': ' facebook ', ' face ': ' facebook ', ' very ': u' rất ',
            'dep': u' đẹp ',u' xau ': u' xấu ','nice': u' hay ', u'qủa': u' quả ',
            'iu': u' yêu ','fake': u' giả mạo ', '><': u' positive ',
            ' por ': u' tệ ',' poor ': u' tệ ',}
        for k, v in replace_list.items():
            text = text.replace(k, v)
        #remove nốt những ký tự thừa thãi
        text = text.replace(u'"', u' ')
        text = text.replace(u'️', u'')
        text = text.replace('🏻','')
        text = word_tokenize(text, format="text")
        return text
# def replace_list(text):
#   replace_list = { ' tks ': u' cám ơn ', 'thks': u' cám ơn ', 'thanks': u' cám ơn ', 'ths': u' cám ơn ', 'thank': u' cám ơn ', 'shop': u' cửa hàng ', 'sp': u' sản phẩm ',
#  '😒': ' negative ', '🙂': ' positive ', '😏': ' negative ', '😝': ' positive ', '😄': ' positive ',
#   '😙': ' positive ', '😤': ' negative ', '😎': ' positive ', '😆': ' positive ', '💚': ' positive ',
#   '?':'','.': '',',': '',}
#   for k, v in replace_list.items():
#             text = text.replace(k, v)
#   return text

def clean(text):
  return word_tokenize(normalize_text(text), format="text")

def get_list(text):
  list_word=word_tokenize(clean(text))
  return list_word
  
def classify_word(text):
  return classify(text)
