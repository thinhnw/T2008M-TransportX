import React, {useEffect, useRef, useState} from "react";
import {Marker,Map,Popup,TileLayer} from "react-leaflet";

const Search_post_office=()=>{
    const [branches,setBranch]=useState([]);//data
    const latitudeAndLongitude=[
        [30.827433, -89.715243],
        [48.112830, 14.039010],
        [40.043080, -74.878040],
        [32.853410,-79.860910],
        [34.421300,-112.589670],
        [51.451110,-2.476020],
        [29.961160,-95.461910],
        [11.194340,124.776450],
        [45.400510,-92.989410],
        [-37.015490,144.650290]
    ];//Latitude and Longitude
    const [position,setProsition]=useState([30.827433, -89.715243])
//...................................................//

    //getData using axios
    useEffect(()=> {
        const getData = async () => {
            const rs = await axios.get("/listBranch");
            setBranch(rs.data.listbranch);
        }
        getData()
    },[])
//...................................................//

    //Render Data
    const renderListBranch=branches.map(
        (items,key)=>{
            return(
                <div onClick={()=>flyTo(items.id)}>
                    <p>{items.address}</p>
                    <span>{items.city}</span><br/>
                    <span>{items.phone_number}</span><br/>
                    <span>{items.zip_code}</span>
                </div>
            )
        }
    );
//...................................................//

    //Set Marker
    const nameBranch=branches.map(item=>item.address);
    const renderMarker= latitudeAndLongitude.map((item,key)=>{
            return(
                <Marker position={item}>
                    <Popup>
                        {nameBranch[key]}
                    </Popup>
                </Marker>
            )
        })
//...................................................//

    //fly to the location
    const mapRef=useRef();
    const flyTo=(id)=>{
        const { current = {} } =mapRef;
        const { leafletElement:map } =current;
        map.flyTo(latitudeAndLongitude[(id-1)],8,{
            duration:2
        })

    }

    //...................................................//

    //Render Map
    const renderMap=()=>{
        return(
            <Map ref={mapRef} center={position} zoom={2} scrollWheelZoom={true} id={"Map"}  minZoom={2}>
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {renderMarker}
            </Map>
        )
    }
//...................................................//

    //Search the office
    const searchOffice=()=>{
        return(
            <div>
                <input type={'text'} id={"addr"}/>
                <button type={'button'} onClick={addr_search} id={"click_search"}>Search</button>
            </div>
        )
    }

    //Addr Search function
    const addr_search=()=>{
        let inp=document.getElementById('addr');
        const xmlhttp=new XMLHttpRequest();
        const url ="https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + inp.value;
        xmlhttp.onreadystatechange = function (){
            if (this.readyState===4 && this.status===200){
                const myArr=JSON.parse(this.responseText);
                myFunction(myArr);
            }
        };
        xmlhttp.open("GET",url,true);
        xmlhttp.send();
    }
//...................................................//

    //myFunction()
    const myFunction=(arr)=>{

        const { current = {} } =mapRef;
        const { leafletElement:map } =current;
        map.flyTo([arr[0].lat,arr[0].lon],8,{
            duration:2
        })
        return(
          <Marker >

          </Marker>
        );

    }
    return(
        <>
            <div id={"about_post_office"} >
                <div id={"review_post_office"}>
                    <div id={"reviews"}>
                        <h4>Mạng lưới bưu cục trên 63 tỉnh thành</h4>
                        <small>Mạng lưới chuyển phát của Viettel Post phủ sóng khắp 63 tỉnh thành trên lãnh thổ Việt Nam.</small>
                    </div>
                    <div id={"advertise"}>
                        <div id={"user_trust"}>
                            <div>
                                <h1>328.633</h1>
                                <small>Khách hàng tin dùng</small>
                            </div>
                            <div>
                                <h1>521.319</h1>
                                <small>Đơn hàng đang vận chuyển</small>
                            </div>
                        </div>
                        <img loading="lazy" src="https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4.png"
                             width="100%" height="400" alt="" title="buucuc4" className="img-responsive wp-image-624"
                             srcSet="https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-200x81.png 200w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-400x163.png 400w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-600x244.png 600w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-800x326.png 800w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-1200x488.png 1200w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4.png 1831w"
                             sizes="(max-width: 800px) 100vw, 1831px"/>
                    </div>
                </div>
                <div id={"location"}>
                    {searchOffice()}
                    <div id={"branchAndMap"}>
                        <div id={"listBranch"}>
                            {renderListBranch}
                        </div>
                            {renderMap()}
                    </div>
                </div>
            </div>
        </>
    )
}
export default Search_post_office;
