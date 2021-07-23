import axios from 'axios';
import React, { useEffect, useState } from 'react'
import ReactDOM from 'react-dom'
import {
  Card, CardImg, CardText, CardBody,
  CardTitle, CardSubtitle, Button,
  Input
} from 'reactstrap';
export default function Delivery(props) {
  const [ provinces, setProvinces ] = useState([])
  const [ districts, setDistricts ] = useState([])
  const [ wards, setWards] = useState([])
  const [ branches, setBranches] = useState([])
  const [ rates, setRates ] = useState({})
  const [ error, setError] = useState('')
  const [ form, setForm ] = useState({
    senderName: '',
    senderEmail: '',
    senderPhone: '',
    receiverName: '',
    receiverEmail: '',
    receiverPhone: '',
    receiverCityCode: 0,
    receiverDistrictCode: 0,
    receiverWardCode: 0,
    receiverCity: '',
    receiverDistrict: '',
    receiverWard: '',
    receiverStreetAddress: '',
    weight: 0,
    length: 0,
    width: 0,
    height: 0,
    deliveryType: '',
    shippingCost: 0,
    processingPostOfficeId: 0
  })
  let distance = 0

  useEffect(() => {
    fetch('https://provinces.open-api.vn/api/p/')
      .then(res => res.json())
      .then(res => {
        setProvinces(res)
      })
    fetch('https://provinces.open-api.vn/api/d/')
      .then(res => res.json())
      .then(res => {
        setDistricts(res)
      })
    fetch('https://provinces.open-api.vn/api/w/')
      .then(res => res.json())
      .then(res => {
        setWards(res)
      })
    fetch('/listBranch')
      .then(res => res.json())
      .then(res => {
        setBranches(res.listbranch)
      })
    fetch('/shipping-rates')
      .then(res => res.json())
      .then(res => {
        setRates(res.data)
      })
  }, []);
  const handleChange = (event) => {
    
		const { name, value } = event.target;
    console.log(name, value)
      if (name == 'receiverCityCode') {
        setForm({
          ...form,
          receiverCityCode: value,
          receiverCity: provinces.find(x => x.code == value).name,
          receiverWardCode: 0,
          receiverDistrictCode: 0,
        })
      } else if (name == 'receiverDistrictCode') {
        setForm({
          ...form,
          [name]: value,
          receiverDistrict: districts.find(x => x.code == value).name,
          receiverWardCode: 0
        })
      } else if (name == 'receiverWardCode') {
            setForm({
              ...form,
              receiverWard: wards.find(x => x.code == value).name,
              [name]: value,
            })
      } else {
        setForm({
          ...form,
          [name]: value
        })
      }
	}
  const getDistance = async () => {
    console.log(form)
    let province = provinces.find(x => x.code == form.receiverCityCode).name
    let district = districts.find(x => x.code == form.receiverDistrictCode).name
    let ward = wards.find(x => x.code == form.receiverWardCode).name
    let receiverAddress = ward + ", " + district + ", " + province

    let poCity = branches.find(x => x.id == form.processingPostOfficeId).city
    let poDistrict = branches.find(x => x.id == form.processingPostOfficeId).district
    let poWard = branches.find(x => x.id == form.processingPostOfficeId).ward
    let poAddress = poWard + ", " + poDistrict + ", " + poCity
    if (poCity == province) {
      distance = 0
      return
    } 
    try {
      let res = await Promise.all([
        axios.get("https://nominatim.openstreetmap.org/search?format=json&limit=1&q=" + receiverAddress),
        axios.get("https://nominatim.openstreetmap.org/search?format=json&limit=1&q=" + poAddress),
      ])
      console.log(res)
      console.log(L.latLng(50, 30), L.latLng('50', '30'))
      let receiverLatLng = L.latLng(res[0].data[0].lat, res[0].data[0].lon)
      let poLatLng = L.latLng(res[1].data[0].lat, res[1].data[0].lon)
      distance = receiverLatLng.distanceTo(poLatLng)
    } catch (e) {
      console.error(e)
    }
    distance = 99
  }

  const getShippingCost = (distance, weight, height, width, length) => {
    let dimensionalWeight = height * width * length / 6000
    let finalWeight = Math.max(dimensionalWeight, weight)
    if (finalWeight <= 100) {
      if (distance == 0) return parseFloat(rates.to100.intraprovince)
      if (distance <= 100000) return parseFloat(rates.to100.to100km)
      if (distance <= 300000) return parseFloat(rates.to100.to300km)
      return rates.to100.above300km
    } 
    if (finalWeight <= 500) {
      if (distance == 0) return parseFloat(rates.to500.intraprovince)
      if (distance <= 100000) return parseFloat(rates.to500.to100km)
      if (distance <= 300000) return parseFloat(rates.to500.to300km)
      return rates.to500.above300km
    } 
    if (finalWeight <= 1000) {
      if (distance == 0) return parseFloat(rates.to1000.intraprovince)
      if (distance <= 100000) return parseFloat(rates.to1000.to100km)
      if (distance <= 300000) return parseFloat(rates.to1000.to300km)
      return rates.to1000.above300km
    } 
    if (distance == 0) return parseFloat(rates.to1000.intraprovince) + parseFloat(rates.every500.intraprovince) * (finalWeight - 1000) / 500
    if (distance <= 100000) return parseFloat(rates.to1000.to100km) + parseFloat(rates.every500.to100km) * (finalWeight - 1000) / 500
    if (distance <= 300000) return parseFloat(rates.to1000.to300km) + parseFloat(rates.every500.to300km) * (finalWeight - 1000) / 500
    return parseFloat(rates.to1000.above300km) + parseFloat(rates.every500.above300km) * (finalWeight - 1000) / 500
  }

  const submitForm = async (e) => {
    let validated = !Object.keys(form).some(key => (!form[key] && key != 'shippingCost'))
    if (!validated) {
      console.log("not validated", form)
      setForm({
        ...form,
        shippingCost: 0
      })
      setError('Please fill all informations!')
      e.preventDefault()
      return
    }
    setError('')
    e.preventDefault()
    if (!form.shippingCost) {
      try {
        await getDistance()
        console.log(distance)
        let cost = getShippingCost(distance, form.weight, form.height, form.width, form.length)
        console.log('cost', cost)
        setForm({
          ...form,
          shippingCost: cost
        })
      } catch (err) {
        console.error(err)
      } finally {
        return
      }
    } else {
      debugger;
      try {
        let res = await axios.post('/book-shipment', {
          data: form
        }) 
        console.log(res)
      } catch (error) {
        console.error(error) 
      }
    }
  }
  return (
    <section className="delivery p-5">
      <div className="container mb-4">
        <h2>BOOK A SHIPMENT</h2>
      </div>
      <form action="" onSubmit={submitForm}>
        <div className="container">
          <div className="row">
            <div className="col-6">
              <div className="card">
                <div className="card-header">
                  <b>
                    Sender
                  </b>
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Name</label>
                    <div className="col-10">
                      <Input type="text" name="senderName" value={form.senderName} onChange={handleChange} required />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Email</label>
                    <div className="col-10">
                      <Input type="email" name="senderEmail" value={form.senderEmail} onChange={handleChange} required />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Phone</label>
                    <div className="col-10">
                      <Input type="tel" name="senderPhone" value={form.senderPhone} onChange={handleChange} required />
                    </div>
                  </div>
                </div>
              </div>
              <div className="card mt-3">
                <div className="card-header">
                  <b>
                    Receiver
                  </b>
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Name</label>
                    <div className="col-10">
                      <Input type="text" name="receiverName" value={form.receiverName} onChange={handleChange} required />
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Email</label>
                    <div className="col-10">
                      <Input type="email" name="receiverEmail" value={form.receiverEmail} onChange={handleChange}  required/>
                    </div>
                  </div>
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-2">Phone</label>
                    <div className="col-10">
                      <Input type="tel"  name="receiverPhone" value={form.receiverPhone} onChange={handleChange} required/>
                    </div>
                  </div>
                  <div className="">
                    <b>Address</b>
                    <div className="row mt-2 align-items-center">
                      <div className="col-4">
                        City/Provinces
                      </div>
                      <div className="col-8">
                        <Input type="select" name="receiverCityCode" placeholder="..." value={form.receiverCityCode} onChange={handleChange}>
                          <option value="0">...</option>
                          {
                            provinces.map(province => {

                              return (
                                <option value={ province.code } key={ province.code }>{ province.name }</option>
                              )
                            })
                          }
                        </Input>
                      </div>
                    </div>
                    <div className="row mt-2 align-items-center">
                      <div className="col-4">
                        District
                      </div>
                      <div className="col-8">
                        <Input type="select" name="receiverDistrictCode" placeholder="..." value={form.receiverDistrictCode} onChange={handleChange}>
                          <option value="0">...</option>
                          {
                            districts.filter(district => district.province_code == form.receiverCityCode).map(district => {

                              return (
                                <option value={ district.code } key={ district.code }>{ district.name }</option>
                              )
                            })
                          }
                        </Input>
                      </div>
                    </div>
                    <div className="row mt-2 align-items-center">
                      <div className="col-4">
                        Ward
                      </div>
                      <div className="col-8">
                        <Input type="select" name="receiverWardCode" placeholder="..." value={form.receiverWardCode} onChange={handleChange}>
                          <option value="0">...</option>
                          {
                            wards.filter(ward => ward.district_code == form.receiverDistrictCode).map(ward => {

                              return (
                                <option value={ ward.code } key={ward.code}>{ ward.name }</option>
                              )
                            })
                          }
                        </Input>
                      </div>
                    </div>
                    <div className="row mt-2 align-items-center">
                      <div className="col-4">
                        Street Address
                      </div>
                      <div className="col-8">
                        <Input type="text" name="receiverStreetAddress" value={form.receiverStreetAddress} onChange={handleChange} required>
                        </Input>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div className="col-6">
              <div className="card">
                <div className="card-header">
                  Parcel Details 
                </div>
                <div className="card-body">
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-3">Weight (gram)</label>
                    <div className="col-9">
                      <Input type="number" step="0.01" name="weight" required onChange={handleChange} />
                    </div>
                  </div> 
                  <div className="form-group row align-items-center">
                    <label htmlFor="" className="col-3 pr-0">Dimension (cm)</label>
                    <div className="col-3 pr-0">
                      <Input type="number" name="height" step="0.01" required placeholder="Height" onChange={handleChange} />
                    </div>
                    <div className="col-3 pr-0">
                      <Input type="number" name="width" step="0.01" required placeholder="Width" onChange={handleChange} />
                    </div>
                    <div className="col-3 ">
                      <Input type="number" name="length" step="0.01" required placeholder="Length" onChange={handleChange} />
                    </div>
                  </div> 
                </div>
              </div>
              <div className="card mt-3">
                <div className="card-header">
                  <b>
                    Service
                  </b>
                </div>
                <div className="card-body">
                  <div className="form-group">
                    <div htmlFor="" className="form-label">Shipment Type</div>
                    <div class="form-check form-check-inline mt-3 ml-3">
                        <Input type="radio"  name="deliveryType" value="delivery" className="form-check-input" onChange={handleChange} />
                        <label className="form-check-label">Delivery</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <Input type="radio"  name="deliveryType" value="pickup" className="form-check-input" onChange={handleChange} />
                        <label  className="form-check-label">Pickup</label>
                    </div>
                    <div class="mt-3">
                      <div>
                        Processing Post Office
                      </div>
                      <div class="mt-2">
                        <Input type="select" name="processingPostOfficeId" placeholder="..." value={form.processingPostOfficeId} onChange={handleChange}>
                          <option value="0">...</option>
                          {
                            branches.map(branch => {

                              return (
                                <option value={ branch.id } key={branch.id}>{ branch.address + ', ' + branch.ward + ', ' + branch.district + ', ' + branch.city }</option>
                              )
                            })
                          }
                        </Input>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-4">
                {
                  form.shippingCost > 0 ?
                  <div className="d-flex flex-column">
                      <div className="card p-3 mb-3 bg-light">
                        Shipping Cost: {form.shippingCost} VND
                      </div>
                      <input type="submit" className="btn btn-danger w-100 text-center text-white py-3" value="Book a shipment" />
                  </div>
                  :  
                  <input type="submit" className="btn btn-danger w-100 text-center text-white py-3" value="CONFIRM" />
                }
              </div>
              <div className="mt-3">
                { error && <small className="text-danger">{error}</small>}
              </div>
            </div>
          </div>
        </div>
      </form>
      
    </section>
  )
}