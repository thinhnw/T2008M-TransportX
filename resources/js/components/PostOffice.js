import Search_post_office from "./search_post_office/search_post_office";
import  ReactDOM from "react-dom";

function PostOffice(){
 return(
     <Search_post_office/>
 )
}
export default PostOffice;
if (document.getElementById("postOffice")){
    ReactDOM.render(<PostOffice/>,document.getElementById("postOffice"))
}
