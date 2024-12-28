using UnityEngine;
using TMPro;
using System.Collections;
using UnityEngine.Networking;

public class InsertScore : MonoBehaviour
{
    string url = "https://lightsandclockwork.net/tutorial/test04.php";  //change
    public TMP_Text text;


    // Start is called once before the first execution of Update after the MonoBehaviour is created
    void Start()
    {
        StartCoroutine(Upload());
    }

    IEnumerator Upload()
    {
        string parameters = "?playername=" + "Ethan" + "&score=" + "30";
        url = url + parameters;

        using (UnityWebRequest UWR = UnityWebRequest.Post(url, "", "application/json"))
        {
            yield return UWR.SendWebRequest();

            if (UWR.result != UnityWebRequest.Result.Success)
            {
                Debug.LogError(UWR.error);
            }
            else
            {
                Debug.Log("Form upload complete!" + UWR.downloadHandler.text);
                text.text = UWR.downloadHandler.text;
            }
        }
    }

}
