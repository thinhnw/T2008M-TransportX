import Search_post_office from "./search_post_office/search_post_office";
import  ReactDOM from "react-dom";
import SearchPostOffice from "./search_post_office/SearchPostOffice";

function PostOffice(){
 return(
     <SearchPostOffice/>
 )
}
export default PostOffice;
if (document.getElementById("postOffice")){
    ReactDOM.render(<PostOffice/>,document.getElementById("postOffice"))
}
