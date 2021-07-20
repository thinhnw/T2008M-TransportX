import {useEffect, useState} from "react";
import {Marker,MapContainer,Popup,TileLayer} from "react-leaflet";

const Search_post_office=()=>{
    const [branches,setBranch]=useState([]);
    const latitudeAndLongitude=[
        {
            latitude:30.827433,
            longitude:-89.715243
        },
        {
            latitude:48.112830,
            longitude:14.039010
        },
        {
            latitude:40.043080,
            longitude:-74.878040
        },
        {
            latitude:32.853410,
            longitude: -79.860910
        },
        {
            latitude:34.421300,
            longitude:-112.589670
        },
        {
            latitude:51.451110,
            longitude:-2.476020
        },
        {
            latitude:29.961160,
            longitude:-95.461910
        },
        {
            latitude:11.194340,
            longitude:124.776450
        },
        {
            latitude:45.400510,
            longitude:-92.989410
        },
        {
            latitude:-37.015490,
            longitude:144.650290
        }
    ]
    const [position,setProsition]=useState([30.827433, -89.715243])
    const [map,setMap]=useState(null);
    useEffect(()=> {
        const getData = async () => {
            const rs = await axios.get("/listBranch");
            setBranch(rs.data.listbranch);
        }
        getData()
    },[])

    const renderListBranch=branches.map(
        (items,key)=>{
            return(
                <div onClick={()=>flyTo(items.id)}>
                    <span>{items.address}</span>
                    <span>{items.city}</span>
                    <span>{items.phone_number}</span>
                    <span>{items.zip_code}</span>
                </div>
            )
        }
    );
    const nameBranch=branches.map(item=>item.address);
    const renderMarker= latitudeAndLongitude.map((item,key)=>{
            return(
                <Marker position={[item.latitude, item.longitude]}>
                    <Popup>
                        {nameBranch[key]}
                    </Popup>
                </Marker>
            )
        })
    const flyTo=(id)=>{
        setProsition(latitudeAndLongitude[id-1]);
        map.flyTo(Array.from(latitudeAndLongitude[id-1]))
    }

    const renderMap=()=>{
        return(
            <MapContainer center={position} zoom={8} scrollWheelZoom={true} id={"Map"} whenCreated={map=>setMap(map)} minZoom={2}>
                <TileLayer
                    attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                />
                {renderMarker}
            </MapContainer>
        )
    }

    return(
        <>
            <div id={"about_post_office"} className={"container"}>
                <div id={"review_post_office"}>
                    <div>
                        <span>Mạng lưới bưu cục trên 63 tỉnh thành</span>
                        <small>Mạng lưới chuyển phát của Viettel Post phủ sóng khắp 63 tỉnh thành trên lãnh thổ Việt Nam.</small>
                    </div>
                    <div>
                        <img loading="lazy" src="https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4.png"
                             width="100%" height="745" alt="" title="buucuc4" className="img-responsive wp-image-624"
                             srcSet="https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-200x81.png 200w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-400x163.png 400w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-600x244.png 600w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-800x326.png 800w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4-1200x488.png 1200w, https://viettelpost.com.vn/wp-content/uploads/2019/01/buucuc4.png 1831w"
                             sizes="(max-width: 800px) 100vw, 1831px"/>
                    </div>
                </div>
                <div id={"branchAndMap"}>
                    <div id={"listBranch"}>
                        {renderListBranch}
                    </div>
                        {renderMap()}
                </div>
            </div>
        </>
    )
}
export default Search_post_office;
