<template>
    <div class="container mx-auto p-4">
        <div class="m-page-title">
            <h1 class="text-2xl font-bold">Admin - Websites</h1>
            <div class="buttons">
                <button
                    @click="setCardView"
                    class="m-btn"
                    :class="{ 'active': isCardView }">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="24px" height="24px"
                         viewBox="0 0 36 36">
                        <title>grid-view-line</title>
                        <path d="M14,4H6A2,2,0,0,0,4,6v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V6A2,2,0,0,0,14,4ZM6,14V6h8v8Z"/>
                        <path
                            d="M30,4H22a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V6A2,2,0,0,0,30,4ZM22,14V6h8v8Z"/>
                        <path
                            d="M14,20H6a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V22A2,2,0,0,0,14,20ZM6,30V22h8v8Z"/>
                        <path
                            d="M30,20H22a2,2,0,0,0-2,2v8a2,2,0,0,0,2,2h8a2,2,0,0,0,2-2V22A2,2,0,0,0,30,20ZM22,30V22h8v8Z"/>
                    </svg>
                </button>
                <button
                    @click="setListView"
                    class="m-btn"
                    :class="{ 'active': !isCardView }">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000000" width="24px" height="24px"
                         viewBox="0 0 52 52">
                        <path
                            d="M50,15.52H2a2,2,0,0,1-2-2V2A2,2,0,0,1,2,0H50a2,2,0,0,1,2,2V13.52A2,2,0,0,1,50,15.52Zm-46-4H48V4H4Z"/>
                        <path
                            d="M50,33.76H2a2,2,0,0,1-2-2V20.24a2,2,0,0,1,2-2H50a2,2,0,0,1,2,2V31.76A2,2,0,0,1,50,33.76Zm-46-4H48V22.24H4Z"/>
                        <path
                            d="M50,52H2a2,2,0,0,1-2-2V38.48a2,2,0,0,1,2-2H50a2,2,0,0,1,2,2V50A2,2,0,0,1,50,52ZM4,48H48V40.48H4Z"/>
                    </svg>
                </button>
                <button
                    @click="openPopUp"
                    class="m-btn">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M11.5 0c6.347 0 11.5 5.153 11.5 11.5s-5.153 11.5-11.5 11.5-11.5-5.153-11.5-11.5 5.153-11.5 11.5-11.5zm0 1c5.795 0 10.5 4.705 10.5 10.5s-4.705 10.5-10.5 10.5-10.5-4.705-10.5-10.5 4.705-10.5 10.5-10.5zm.5 10h6v1h-6v6h-1v-6h-6v-1h6v-6h1v6z"
                              stroke="black" stroke-width="0.8"/>
                    </svg>
                </button>
            </div>
        </div>
        <div v-if="isCardView" class="m-wrapper">
            <div
                v-for="website in websites"
                :key="website.id"
                class="m-item"
                @click="goToDetail(website.id)"
            >
                <div class="m-item-content">
                    <iframe
                        :src="website.url"
                        class="w-full h-[500px] rounded-lg mb-4"
                        frameborder="0"
                        scrolling="no"
                        style="pointer-events: none; transform: scale(0.8); transform-origin: 0 0; width: 125%; height: 125%; overflow: hidden;"></iframe>
                    <div class="overlay">
                        <button @click.stop="visitWebsite(website.id)" class="m-btn website-name">
                            <h2 class="text-xl font-bold">{{ website.name }}</h2>
                            <svg class="m-website" xmlns="http://www.w3.org/2000/svg"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" version="1.1" id="Capa_1"
                                 width="800px" height="800px" viewBox="0 0 442.04 442.04" xml:space="preserve"><g><g>
                            <path
                                d="M221.02,341.304c-49.708,0-103.206-19.44-154.71-56.22C27.808,257.59,4.044,230.351,3.051,229.203    c-4.068-4.697-4.068-11.669,0-16.367c0.993-1.146,24.756-28.387,63.259-55.881c51.505-36.777,105.003-56.219,154.71-56.219    c49.708,0,103.207,19.441,154.71,56.219c38.502,27.494,62.266,54.734,63.259,55.881c4.068,4.697,4.068,11.669,0,16.367    c-0.993,1.146-24.756,28.387-63.259,55.881C324.227,321.863,270.729,341.304,221.02,341.304z M29.638,221.021    c9.61,9.799,27.747,27.03,51.694,44.071c32.83,23.361,83.714,51.212,139.688,51.212s106.859-27.851,139.688-51.212    c23.944-17.038,42.082-34.271,51.694-44.071c-9.609-9.799-27.747-27.03-51.694-44.071    c-32.829-23.362-83.714-51.212-139.688-51.212s-106.858,27.85-139.688,51.212C57.388,193.988,39.25,211.219,29.638,221.021z"/></g><g>
                            <path
                                d="M221.02,298.521c-42.734,0-77.5-34.767-77.5-77.5c0-42.733,34.766-77.5,77.5-77.5c18.794,0,36.924,6.814,51.048,19.188    c5.193,4.549,5.715,12.446,1.166,17.639c-4.549,5.193-12.447,5.714-17.639,1.166c-9.564-8.379-21.844-12.993-34.576-12.993    c-28.949,0-52.5,23.552-52.5,52.5s23.551,52.5,52.5,52.5c28.95,0,52.5-23.552,52.5-52.5c0-6.903,5.597-12.5,12.5-12.5    s12.5,5.597,12.5,12.5C298.521,263.754,263.754,298.521,221.02,298.521z"/></g><g>
                            <path
                                d="M221.02,246.021c-13.785,0-25-11.215-25-25s11.215-25,25-25c13.786,0,25,11.215,25,25S234.806,246.021,221.02,246.021z"/></g></g>
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <ul>
                <li
                    v-for="website in websites"
                    :key="website.id"
                    class="flex justify-between items-center bg-white shadow-md rounded-lg p-4 mb-2 hover:shadow-lg cursor-pointer"
                    @click="goToDetail(website.id)"
                >
                    <span class="text-lg font-semibold">{{ website.name }}</span>
                    <span class="text-sm text-gray-600">{{ website.description }}</span>
                </li>
            </ul>
        </div>
    </div>
    <div v-if="isPopupOpen" class="popup-overlay">
        <div class="popup">
            <h3>Add New Website</h3>
            <input v-model="websiteName" type="text" placeholder="Website Name" />
            <input v-model="websiteURL" type="text" placeholder="Website URL" />
            <div class="popup-buttons">
                <button @click="closePopUp" class="close-btn">Cancel</button>
                <button @click="addWebsite" class="submit-btn">Add Website</button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();

// Popup state
const isPopupOpen = ref(false);
const openPopUp = () => isPopupOpen.value = true;
const closePopUp = () => isPopupOpen.value = false;

// Card view state
const isCardView = ref(true);
const websites = ref([]);
const websiteName = ref('');
const websiteURL = ref('');

const fetchWebsites = async () => {
    try {
        const response = await axios.get('/api/websites');
        websites.value = response.data;
    } catch (error) {
        console.error('Error fetching websites:', error);
    }
};
onMounted(fetchWebsites);
const setCardView = () => {
    isCardView.value = true;
};
const setListView = () => {
    isCardView.value = false;
};
// Open website preview in new tab
const visitWebsite = (id) => {
    const website = websites.value.find(website => website.id === id);
    if (website) {
        window.open(website.url, '_blank');
    } else {
        console.log('Website not found');
    }
};
const goToDetail = async (id) => {
    try {
        const response = await axios.get(`/api/websites/${id}`);
        const website = response.data;
        router.push({ name: 'WebsiteDetails', params: { id }, query: { name: website.name, url: website.url } });

    } catch (error) {
        console.error("Error fetching website details:", error);
    }
};
const addWebsite = async () => {
    if (websiteName.value && websiteURL.value) {
        try {
            const response = await axios.post('/api/websites', {
                name: websiteName.value,
                url: websiteURL.value
            });

            if (response.data.success) {
                // Add the new website to the list
                websites.value.push({
                    id: response.data.website.id,
                    name: response.data.website.name,
                    description: '',
                    url: response.data.website.url,
                });
                closePopUp();
                websiteName.value = '';
                websiteURL.value = '';
            }
        } catch (error) {
            console.error('There was an error adding the website:', error);
        }
    } else {
        console.log('Please fill out both the website name and URL');
    }
};
</script>

<style scoped>
.container {
    max-width: 1350px;
}

.m-wrapper {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    background: white;
    padding: 40px;
    border-radius: 20px;
}

.m-item {
    position: relative;
    border: solid 1px #e3e3e3;
    border-radius: 10px;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
    height: 300px;
    overflow: hidden;
}

.m-item:hover {
    transform: scale(1.02);
}

.m-item:hover .overlay {
    opacity: 1;
    visibility: visible;
    height: 100%;
    width: 100%;
}

.m-item-content {
    position: relative;
    height: 100%;
}

.overlay {
    display: flex;
    align-items: flex-end;
    position: absolute;
    top: 50%;
    left: 50%;
    height: 100%;
    width: 100%;
    transform: translate(-50%, -50%);
    opacity: 0;
    visibility: hidden;
    color: white;
    text-align: center;
    background: linear-gradient(203deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6615021008403361) 40%, rgba(0,0,0,1) 100%);
    padding: 20px;
    border-radius: 10px;
    transition: opacity 0.3s, visibility 0.3s;
}

iframe {
    width: 100%;
    height: 100%;
    border-radius: 15px;
    border: none;
    overflow: hidden;
}

.buttons {
    display: flex;
    justify-content: right;
    gap: 10px;

    .m-btn {
        border: none;
        padding: 10px;
        border-radius: 50%;
        transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;

        > svg {
            transition: fill 0.3s ease-in-out;
        }

        &:hover {
            transform: scale(1.05);
            background: #FB1919;

            > svg {
                fill: white;
            }
        }

        &.active {
            background: #FB1919;
            transform: scale(1.1);

            > svg {
                fill: white;
            }
        }
    }
}

.m-page-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 40px;
}

.m-website {
    width: 30px;
    height: 30px;
}

.website-name {
    display: flex;
    background: transparent;
    border: none;
    gap: 0 30px;
    align-items: center;
    justify-content: space-between;
    color: white;
    flex-direction: row;

    svg {
        transition: all 0.3s ease-in-out;
        margin-bottom: 10px;
    }

    &:hover {
        svg {
            border-radius: 50%;
            background: #FB1919;
            width: 50px;
            fill: #fff;
        }
    }
}
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index : 9999;
}
.popup {
    width: 400px;
    background: white;
    padding: 30px;
    border-radius: 30px;
    text-align: center;
}
.popup input {
    display: block;
    margin: 20px auto;
    padding: 10px;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 10px;
}
.popup-buttons {
    display: flex;
    justify-content: space-around;
    margin-top: 15px;
}
.close-btn, .submit-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 30px;
    cursor: pointer;
}
.close-btn {
    background: white;
    color: #FB1919;
    border: 1px solid #ccc;
    transition: all 0.3s ease-in-out;
}

.close-btn:hover {
    background: #FB1919;
    color: white;
    border-color: #FB1919;
}

.submit-btn {
    background: #FB1919;
    color: white;
    transition: all 0.3s ease-in-out;
}

.submit-btn:hover {
    background: #FB1919;
    color: white;
    border: 1px solid black;
}

</style>
