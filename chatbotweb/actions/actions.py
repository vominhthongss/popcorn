from typing import Any, Text, Dict, List
from dns.rdatatype import NULL
from mysql.connector import connect

from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
# connect database
from dbConnect import get_data
from dbConnect import get_data_all
from tokenize_word import get_list

class ActionHelloWorld(Action):

    def name(self) -> Text:
        return "action_hello_world"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:

        dispatcher.utter_message(text="Hello World!")

        return []
#action 1
class ActionSearchByMovieContent(Action):

    def name(self) -> Text:
        return "action_search_by_movie_content" #(name action 1)

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        #lấy message gửi đến
        mes = tracker.latest_message['text'] 
        #tách từ trong message lưu vào list
        tokenize_message_list= get_list(mes)
        pre_tokenize_message_list=[]
        for x in tokenize_message_list:
            if x!='phim' and x!='gì' and x!='mà' and x!='có' and x!='đóng' and x!='á' and x!='nhân_vật' and x!='tên':
                pre_tokenize_message_list.append(x)
                print("Lấy được từ khóa: ",x)
        
        #tạo danh sách lưu id phim
        search_film_list=[]
        for y in pre_tokenize_message_list:
            print("Đang tìm: "+y)
            sql = "SELECT * FROM phim WHERE PHIM_TOMTAT LIKE '%{0}%' ".format(y)
            data= get_data(sql)
            if data!=None:
                search_film_list.append(data[0]) #lấy id
        #loại bỏ id trùng và lưu vào danh sách mới
        id_film_list=list(dict.fromkeys(search_film_list)) 
        id_film_list.sort()
        #tạo danh sách lưu tên phim
        search_film_list=[]
        url_film_list_pre=[]
        for k in id_film_list:
            sql = "SELECT * FROM phim WHERE PHIM_ID={0} ".format(k)
            data2= get_data(sql)
            if data2!=None:
                #tách từ data2[7]
                content_list=[]
                print("Đang lấy tóm tắt : ",data2[7])
                content_list=get_list(data2[7])
                #for các từ data2[7]
                for m in content_list:
                    for n in pre_tokenize_message_list:
                        if m==n:
                            print("vì ["+m+"]=["+n+"] => thêm "+data2[5]+" vào danh sách phim tìm.")
                            search_film_list.append(data2[5])
                            url_film_list_pre.append(format(k))
                #so sách với ds_loc nếu các từ data2 trùng với các từ ds_loc thì add data2[1] vào 1 danh sách ds_phim_tim_chinh_xac
        remove_dup_list=list(dict.fromkeys(search_film_list))
        count_film=len(remove_dup_list)
        remove_dup_list.sort()  

        url_film_list=list(dict.fromkeys(url_film_list_pre))
        url_film_list.sort() 
        result=''                           
        for j in remove_dup_list:
            result+=j+'\n'
        rs =result  
        if rs=="":
            dispatcher.utter_message(text="Hì, bạn có thể nói cụ thể hơn được không? Ít thông tin quá mình tìm không được ! 😀")
        else:
            dispatcher.utter_message(text="Tìm được "+format(count_film)+" phim là: \n"+rs)
            for p in url_film_list:
                sql="SELECT PHIM_TEN,PHIM_URLPOSTER FROM PHIM WHERE PHIM_ID="+p+" "
                data = get_data(sql)
                phim_ten=format(data[0])
                phim_urlposter=format(data[1])
                dispatcher.utter_message(text="Đó là phim: "+phim_ten,image="http://127.0.0.1:8000/"+phim_urlposter)
                dispatcher.utter_message(text="Bạn có thể xem ở đây: http://127.0.0.1:8000/detail/"+p+"\n")
        return []


#action 2

class ActionSearchByMovieActor(Action):
    def name(self) -> Text:
        return "action_search_by_movie_actor" #(name action 2)

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        #lấy message gửi đến
        mes = tracker.latest_message['text'] 
        #tách từ trong message lưu vào list
        tokenize_message_list= get_list(mes)
        pre_tokenize_message_list=[]
        for x in tokenize_message_list:
            if x!='phim' and x!='gì' and x!='mà' and x!='có' and x!='đóng' and x!='á' and x!='nhân_vật' and x!='tên':
                pre_tokenize_message_list.append(x)
                print("Lấy được từ khóa: ",x)
        
        #tạo danh sách lưu id phim
        search_film_list=[]
        for y in pre_tokenize_message_list:
            print("Đang tìm: "+y)
            # sql = "SELECT * FROM thamgia WHERE DIENVIEN LIKE '%{0}%' ".format(y)
            sql = "SELECT A.PHIM_ID,B.DIENVIEN_TEN FROM thamgia as A, dienvien as B WHERE A.DIENVIEN_ID=B.DIENVIEN_ID AND B.DIENVIEN_TEN LIKE '%{0}%'".format(y)
            data= get_data_all(sql)
        for ldate in data:
            search_film_list.append(ldate[0])
            # if data!=None:
            #     search_film_list.append(data[0]) #lấy id
        #loại bỏ id trùng và lưu vào danh sách mới
        id_film_list=list(dict.fromkeys(search_film_list)) 
        id_film_list.sort()
        #tạo danh sách lưu tên phim
        search_film_list=[]
        url_film_list_pre=[]
        for k in id_film_list:
            #sql = "SELECT * FROM phim WHERE PHIM_ID={0} ".format(k)
            #sql="SELECT B.PHIM_ID,B.PHIM_TEN,A.DIENVIEN FROM thamgia AS A,phim AS B WHERE A.PHIM_ID=B.PHIM_ID AND B.PHIM_ID={0} ".format(k)
            sql="SELECT C.PHIM_ID,C.PHIM_TEN,B.DIENVIEN_TEN FROM thamgia as A, dienvien as B, phim as C WHERE A.DIENVIEN_ID=B.DIENVIEN_ID AND A.PHIM_ID=C.PHIM_ID AND C.PHIM_ID={0} ".format(k)
            row= get_data_all(sql)
            for data2 in row:
                #tách từ data2[2]
                content_list=[]
                print("Đang lấy tên diễn viên : ",data2[2])
                content_list=get_list(data2[2])
                #for các từ data2[2]
                for m in content_list:
                    for n in pre_tokenize_message_list:
                        if m==n:
                            print("vì ["+m+"]=["+n+"] => thêm "+data2[1]+" vào danh sách phim tìm.")
                            search_film_list.append(data2[1])
                            url_film_list_pre.append(format(k))
                #so sách với ds_loc nếu các từ data2 trùng với các từ ds_loc thì add data2[1] vào 1 danh sách ds_phim_tim_chinh_xac
        remove_dup_list=list(dict.fromkeys(search_film_list))
        count_film=len(remove_dup_list)
        remove_dup_list.sort()  
        result=''           
        url_film_list=list(dict.fromkeys(url_film_list_pre))
        url_film_list.sort()                 
        for j in remove_dup_list:
            result+=j+'\n'    
        rs =result
        if rs=="":
            dispatcher.utter_message(text="Hì, bạn có thể nói cụ thể hơn được không? Ít thông tin quá mình tìm không được ! 😀")
        else:
            dispatcher.utter_message(text="Tìm được "+format(count_film)+" phim là: \n"+rs)
            for p in url_film_list:
                sql="SELECT PHIM_TEN,PHIM_URLPOSTER FROM PHIM WHERE PHIM_ID="+p+" "
                data = get_data(sql)
                phim_ten=format(data[0])
                phim_urlposter=format(data[1])
                dispatcher.utter_message(text="Đó là phim: "+phim_ten,image="http://127.0.0.1:8000/"+phim_urlposter)
                dispatcher.utter_message(text="Bạn có thể xem ở đây: http://127.0.0.1:8000/detail/"+p+"\n")
        return []    



#action 3
class ActionBestFilmByGenre(Action):
    def name(self) -> Text:
        return "action_best_film_by_genre"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        mes = tracker.latest_message['entities'][0]['value']
        genre = mes.lower()
        #sql="SELECT A.PHIM_TEN,A.PHIM_ID,A.PHIM_URLPOSTER,B.THELOAI, A.PHIM_DIEMIMDB FROM phim as A, theloaiphim AS B WHERE A.PHIM_ID=B.PHIM_ID AND B.THELOAI LIKE '%{0}%' ORDER BY A.PHIM_DIEMIMDB DESC ".format(genre)
        sql="SELECT A.PHIM_TEN,A.PHIM_ID,A.PHIM_URLPOSTER,C.THELOAI_TEN, A.PHIM_DIEMIMDB FROM phim as A, theloaiphim AS B,theloai as C WHERE A.PHIM_ID=B.PHIM_ID AND B.THELOAI_ID=C.THELOAI_ID AND C.THELOAI_TEN  LIKE '%{0}%' ORDER BY A.PHIM_DIEMIMDB DESC".format(genre)
        
        data = get_data(sql)
        phim_ten=format(data[0])
        phim_id=format(data[1])
        phim_urlposter=format(data[2])
        if(data!=None):
            dispatcher.utter_message(text="Đó là phim: "+phim_ten,image="http://127.0.0.1:8000/"+phim_urlposter)
            dispatcher.utter_message(text="Nhấp vào để xem: http://127.0.0.1:8000/detail/"+format(phim_id))
        else:
            dispatcher.utter_message(text="Xin lỗi hiện tại mình không tìm thấy phim nào ! 😓")
        return []

#end actions 3

#action 5
class ActionViewWeek(Action):
    def name(self) -> Text:
        return "action_view_week"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        #sql="SELECT THELOAI_ID,THONGKE, COUNT(THONGKE) AS LUOT FROM (SELECT PHIM_ID,THELOAI_ID,WEEK(LUOTXEM_THOIGIAN) AS THONGKE FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=2021) AS A GROUP BY THELOAI_ID,THONGKE ORDER BY THONGKE DESC, LUOT DESC"
        sql="SELECT A.theloai_ten, B.luot FROM theloai AS A,(SELECT THELOAI_ID,THONGKE, COUNT(THONGKE) AS LUOT FROM (SELECT PHIM_ID,THELOAI_ID,WEEK(LUOTXEM_THOIGIAN) AS THONGKE FROM luotxem WHERE YEAR(LUOTXEM_THOIGIAN)=2021) AS A GROUP BY THELOAI_ID,THONGKE ORDER BY THONGKE DESC, LUOT DESC) AS B WHERE A.theloai_id=B.theloai_id GROUP BY A.theloai_ten ORDER BY B.luot DESC"
        data = get_data(sql)

        if(data!=None):
            dispatcher.utter_message(text="Đó là thể loại: "+format(data[0]))
            
        else:
            dispatcher.utter_message(text="Xin lỗi hiện tại mình không tìm thấy phim nào ! 😓")
        return []

#end actions 5

#action 6
class ActionNearBestFilm(Action):
    def name(self) -> Text:
        return "action_near_best_film"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        
        sql="SELECT B.PHIM_ID,B.PHIM_TEN,B.PHIM_URLPOSTER FROM luotxem as A, phim as B WHERE A.PHIM_ID=B.PHIM_ID AND DATE(A.LUOTXEM_THOIGIAN)>CURDATE() -3 GROUP BY PHIM_ID,PHIM_TEN,PHIM_URLPOSTER ORDER BY LUOTXEM_THOIGIAN DESC LIMIT 5"
        row= get_data_all(sql)
        # phim_id=[]
        # phim_ten=[]
        # phim_urlposter=[]
        if(row!=None):
            for data in row:
                print("Đang lấy thông tin phim... ")
                # phim_id.append(data[0])
                # phim_ten.append(data[1])
                # phim_urlposter.append(data[2])
                dispatcher.utter_message(text="Đó là phim: "+data[1],image="http://127.0.0.1:8000/"+data[2])
                dispatcher.utter_message(text="Nhấp vào để xem: http://127.0.0.1:8000/detail/"+format(data[0]))
                
        else:
            dispatcher.utter_message(text="Xin lỗi hiện tại mình không tìm thấy phim nào ! 😓")
  
        return []

#end actions 6

#action 7
class ActionRateGenre(Action):
    def name(self) -> Text:
        return "action_rate_genre"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        mes = tracker.latest_message['entities'][0]['value']
        genre = mes.lower()
        sql="SELECT DANHGIA_SOSAO,COUNT(DANHGIA_SOSAO) FROM(SELECT D.THELOAI_TEN,A.DANHGIA_SOSAO FROM DANHGIA as A, PHIM as B, THELOAIPHIM as C, THELOAI as D WHERE A.PHIM_ID=B.PHIM_ID AND B.PHIM_ID=C.PHIM_ID AND C.THELOAI_ID=D.THELOAI_ID) AS E WHERE THELOAI_TEN='{0}' GROUP BY DANHGIA_SOSAO".format(genre)
        sql2="SELECT COUNT(*) FROM(SELECT D.THELOAI_TEN,A.DANHGIA_SOSAO FROM DANHGIA as A, PHIM as B, THELOAIPHIM as C, THELOAI as D WHERE A.PHIM_ID=B.PHIM_ID AND B.PHIM_ID=C.PHIM_ID AND C.THELOAI_ID=D.THELOAI_ID) AS E WHERE THELOAI_TEN='{0}' GROUP BY DANHGIA_SOSAO".format(genre)
        
        row = get_data_all(sql)
        row2 = get_data(sql2)
        print(row2)
        rs=""
        for data in row:
            rs+=format(data[0])+" ⭐ : "+format(data[1])+" đánh giá\n"
        
        if(row2!=None):
            dispatcher.utter_message(text="Các đánh giá cụ thể: \n"+rs)
        else:
            dispatcher.utter_message(text="Xin lỗi hiện tại chưa có đánh giá nào ! 😓")
        return []

#end actions 7

class ActionDefaultFallback(Action):
    def name(self):
        return "action_default_fallback"

    def run(self, dispatcher, tracker, domain):
        dispatcher.utter_message("Alo, bạn nói gì dạ ???")
        return []