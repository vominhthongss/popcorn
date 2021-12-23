from tokenize_word import get_list
from tokenize_word import clean
from tokenize_word import classify_word
text = input("Nhập:")
# ds=get_list(text)
# for x in ds:
#   print(x)
# print(clean(text))
print(classify_word(text))
