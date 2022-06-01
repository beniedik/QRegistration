<?php
include 'template/header.php';
?>
<div>
            <header><h2>Item Registration</h2></header>
            <form>
                <div>
                    <div>
                        <h4>Item Details</h4>
                        <div>
                            <div>
                                <label>Item</label>
                                <select>
                                    <option value="">Select Your Option</option>
                                    <option value="12 String Guitar">12 String Guitar</option>
                                    <option value="Acoustic Guitar">Acoustic Guitar</option>
                                    <option value="Bag">Bag</option>
                                    <option value="Banduria">Banduria</option>
                                    <option value="Cajon">Cajon</option>
                                    <option value="Camera">Camera</option>
                                    <option value="Camera Gimbal">Camera Gimbal</option>                                
                                    <option value="Cello">Cello</option>                                
                                    <option value="Classical Guitar">Classical Guitar</option>                                 
                                    <option value="Classical Violin">Classical Violin</option>                           
                                    <option value="DVD-Writer">DVD-Writer</option>                                    
                                    <option value="Globe Prepaid WiFi">Globe Prepaid WiFi</option>                                    
                                    <option value="Graphic Tablet">Graphic Tablet</option>                                  
                                    <option value="Guitar">Guitar</option>                                    
                                    <option value="Ipod">Ipod</option>                                    
                                    <option value="Keyboard">Keyboard</option>   
                                    <option value="Laptop">Laptop</option>                                    
                                    <option value="Lens">Lens</option>                                    
                                    <option value="Mouse">Mouse</option>                                   
                                    <option value="Projector">Projector</option>                                    
                                    <option value="Tablet">Tablet</option>   
                                    <option value="Tripod">Tripod</option> 
                                    <option value="Ukulele">Ukulele</option> 
                                    <option value="Violin">Violin</option>                              
                                </select>
                            </div>
                            
                            <div>
                                <label>Brand</label>
                                <input type="text" placeholder="e.g. Lenovo" required>
                            </div>

                            <div>
                                <label>Color</label>
                                <input type="text" placeholder="e.g. Black" required>
                            </div>

                            <div>
                                <label>Serial Number</label>
                                <input type="text" placeholder="e.g. ABC123" required>
                            </div>
                        </div>
                        <button>Submit</button>
                    </div> 
                </div>
            </form>
        </div>
<?php
include 'template/footer.php';